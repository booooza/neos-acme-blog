<?php
namespace Acme\Blog\Controller;

/*
 * This file is part of the Acme.Blog package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Mvc\Controller\ActionController;
use Acme\Blog\Domain\Model\Post;

class PostController extends ActionController
{

    /**
     * @Flow\Inject
     * @var \Acme\Blog\Domain\Repository\PostRepository
     */
    protected $postRepository;

    /**
     * @return void
     */
    public function indexAction()
    {
        $this->view->assign('posts', $this->postRepository->findAll());
    }

    /**
     * @param \Acme\Blog\Domain\Model\Post $post
     * @return void
     */
    public function showAction(Post $post)
    {
        $this->view->assign('post', $post);
    }

    /**
     * @return void
     */
    public function newAction()
    {
    }

    /**
     * @param \Acme\Blog\Domain\Model\Post $newPost
     * @return void
     */
    public function createAction(Post $newPost)
    {
        $this->postRepository->add($newPost);
        $this->addFlashMessage('Created a new post.');
        $this->redirect('index');
    }

    /**
     * @param \Acme\Blog\Domain\Model\Post $post
     * @return void
     */
    public function editAction(Post $post)
    {
        $this->view->assign('post', $post);
    }

    /**
     * @param \Acme\Blog\Domain\Model\Post $post
     * @return void
     */
    public function updateAction(Post $post)
    {
        $this->postRepository->update($post);
        $this->addFlashMessage('Updated the post.');
        $this->redirect('index');
    }

    /**
     * @param \Acme\Blog\Domain\Model\Post $post
     * @return void
     */
    public function deleteAction(Post $post)
    {
        $this->postRepository->remove($post);
        $this->addFlashMessage('Deleted a post.');
        $this->redirect('index');
    }
}
