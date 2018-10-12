<?php
namespace Acme\Blog\Domain\Model;

/*
 * This file is part of the Acme.Blog package.
 */

use Neos\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Blog
{

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $posts;


    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $posts
     * @return void
     */
    public function setPosts(\Doctrine\Common\Collections\Collection $posts)
    {
        $this->posts = $posts;
    }
}
