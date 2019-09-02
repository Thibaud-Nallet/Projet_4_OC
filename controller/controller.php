<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function welcomeHome()
{
    require('view/welcome.php');
}

function formContact()
{ 
    require('view/contact.php');
}
function inscriptionPage() 
{
    require('view/inscription.php');
}
function connectionPage()
{
    require('view/connection.php');
}

function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/blog.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/post.php');
}

/*
function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}
*/
