<?php

/**
 * Basic naive bayes implementation, from minicoders.com blog
 */

namespace KD2;

abstract class Bayes_Storage
{
	// Increase the count of a word/category pair
	public function incrWordCategory($word, $category)
	{
	}

	// The number of times a word has appeared in a category
	public function wordCount($word, $category)
	{
	}

	// The number of items in a category
	public function categoryCount($category)
	{
	}

	// The total number of items
	public function totalCount()
	{
	}

	// The list of all categories
	public function categories()
	{
	}
}

class Classifier
{
	protected $storage;

	public function __construct($storage)
	{
		$this->storage = $storage;
	}

    // Get words from a text
    public function getWords($text)
    {
        if (preg_match_all('(\w{2,})u', $text, $matches)) {
            return $matches[0];
        }

        return [];
    }

	public function train($text, $category)
	{
	    foreach ($this->getWords($text) as $word) {
	        $this->storage->incrWordCategory($word, $category);
	    }
	}

	public function wordProbability($word, $category)
	{
	    $category_count = $this->storage->categoryCount($category);
	    if ($category_count === 0) return 0;

	    return $this->storage->wordCount($word, $category) / $category_count;
	}

	public function wordWeightedProbability($word, $category, $weight = 1.0, $assumed_probability = 0.5)
	{
	    // Calculate current probability
	    $basic_probability = $this->wordProbability($word, $category);

	    // Count the number of times this word has appeared in all categories
	    $total = 0;
	    foreach ($this->categories() as $c) {
	        $total += $this->storage->wordCount($word, $c);
	    }

	    // Calculate the weighted average
	    return (($weight * $assumed_probability) + ($total * $basic_probability)) / ($weight + $total);
	}
}

class Bayes extends Classifier
{
	protected $threshold = 0.5;

    public function documentProbability($text, $category)
    {
        $probability = 1;

        foreach ($this->getWords($text) as $word) {
            $probability *= $this->wordWeightedProbability($word, $category);
        }

        return $probability;
    }

	// Retourne Pr(Category | Document)
	public function probability($text, $category)
	{
	    // Pr(Category)
	    $category_probability = $this->storage->categoryCount($category) / $this->storage->totalCount();

	    // Pr(Document | Category)
	    $document_probability = $this->documentProbability($text, $category);

	    return $category_probability * $document_probability;
	}

	public function classify($text, $default_category = null)
	{
	    $probabilities = [];
	    $max = 0;
	    $best = $default_category;

	    // Find the category with the highest probability
	    foreach ($this->categories() as $category) {

	        $probabilities[$category] = $this->probability($text, $category);

	        if ($probabilities[$category] > $max) {
	            $max = $probabilities[$category];
	            $best = $category;
	        }
	    }

	    // Make sure the probability exceeds threshold*next best
	    foreach ($probabilities as $category => $probability) {

	        if ($category === $best) continue;

	        if (isset($probabilities[$best]) && $probability * $this->threshold > $probabilities[$best]) {
	            return $default_category;
	        }
	    }

	    return $best;
	}
}

