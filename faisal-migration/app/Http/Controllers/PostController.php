<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PostController extends Controller {
 public function getExcerptDescription() {
  $posts = DB::table( 'posts' )->select( 'excerpt', 'description' )->get();

  return $posts;
 }

 public function distinct() {
  $posts = DB::table( 'posts' )->select( 'author' )->distinct()->get();
  return $posts;
 }

 public function firstDes() {
  $posts = DB::table( 'posts' )->where( 'id', '=', '2' )->first();

  return $posts->description;
 }

 public function getDescription() {
  $posts = DB::table( 'posts' )->where( 'id', 2 )->pluck( 'description' );
  return $posts;
 }

 public function pluck() {
  $posts = DB::table( 'posts' )->pluck( 'title' );
  return $posts;
 }

 public function insertData() {
  DB::table( 'posts' )->insert( [
   'title'        => 'Custom Post',
   'slug'         => 'custom-post',
   'description'  => 'description',
   'excerpt'      => 'excerpt',
   'is_published' => true,
   'min_to_read'  => 2,
   'author'       => 'lia',
   'price'        => 200,
  ] );

  // Print the result of the insert operation
  return 'New record inserted successfully!';
 }

 function update() {
  $id        = 2;
  $newValues = 'Laravel 10';

  $affectedRows = DB::table( 'posts' )
   ->where( 'id', $id )
   ->update( [
    'excerpt'     => $newValues,
    'description' => $newValues,
   ] );

  return "Number of affected rows: " . $affectedRows;
 }

 function destroy() {
  $deletedRows = DB::table( 'posts' )->where( 'id', '=', 3 )->delete();
  return "Number of affected rows: " . $deletedRows;
 }

//  11
 public function countPrice() {

  $count = DB::table( 'users' )->count();
  $count = "Total number of users: " . $count;

  $totalPrice = DB::table( 'products' )->sum( 'price' );
  $totalPrice = "Total price of all products: " . $totalPrice;

  $avgPrice = DB::table( 'products' )->avg( 'price' );
  $avgPrice = "Average price of all products: " . $avgPrice;

  $maxPrice = DB::table( 'products' )->max( 'price' );
  $maxPrice = "Maximum price of a products: " . $maxPrice;

  $minPrice = DB::table( 'products' )->min( 'price' );
  $minPrice = "Minimum price of a product: " . $minPrice;

  return response()->json(
   [
    'coutn'      => $count,
    'totalPrice' => $totalPrice,
    'avgPrice'   => $avgPrice,
    'maxPrice'   => $maxPrice,
    'minPrice'   => $minPrice,
   ] );
 }

 public function question12() {
  $posts = DB::table( 'posts' )->whereNot( 'user_id', 2 )->get();
  return $posts;
 }

 public function whereBetween() {
  $posts = DB::table( 'posts' )->whereBetween( 'min_to_read', [1, 5] )->get();
  return $posts;
 }

 public function increment() {
  $affectedRows = DB::table( 'posts' )
   ->where( 'id', 3 )
   ->increment( 'min_to_read', 1 );

  return "Number of affected rows: " . $affectedRows;
 }
}
