<?php

namespace App\Http\Controllers;

use App\Article;
use App\Country;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $articles = Article::find(2);
        dd($articles->user);
        $articleArr = [];
        foreach ($articles as $article) {
            $result['username'] =  $article->user->name;
            $result['title'] =  $article->title;
            $articleArr['articles'][] = $result;
        }
        return $articleArr;
    }

    public function profile() {
       $articles =  User::with('articles','address')->get();
       return $articles;
    }

    public function userRoles()
    {
        $roles = User::find(4)->roles;
        return $roles;
    }

    public function getAllArticles($countryId)
    {
           $country =  Country::find($countryId);
           return $country->articles;
    }

    public function getArticlesDetail($userId)
    {
        $articles = User::with(['articles','address','roles'])->get();
        return $articles;
    }

    public function articleResource()
    {
        return UserResource::collection(User::with('articles','address','roles')->get());
    }
}
