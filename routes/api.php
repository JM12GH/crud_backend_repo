<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\StudentCategoryController;
use App\Http\Controllers\Api\BranchController;
use App\Http\Controllers\Api\AuthorController;
use App\Http\Controllers\Api\BookCategoryController;
use App\Http\Controllers\Api\BookController;

Route::apiResource('students', StudentController::class);
Route::apiResource('student_categories', StudentCategoryController::class);
Route::apiResource('branches', BranchController::class);
Route::apiResource('authors', AuthorController::class);
Route::apiResource('book_categories', BookCategoryController::class);
Route::apiResource('books', BookController::class);
