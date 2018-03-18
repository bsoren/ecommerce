<?php
/**
 * Created by PhpStorm.
 * User: bsoren
 * Date: 17-Mar-18
 * Time: 5:47 PM
 */

namespace App\controllers\admin;


use App\classes\CSRFToken;
use App\classes\Request;
use App\classes\ValidateRequest;
use App\models\Category;

class ProductCategoryController
{

    public function show() {

        $categories = Category::all();
        $message = 'Nothing';

        return view('admin/products/categories', compact('categories','message'));
    }


    public function store() {

        if (Request::has('post')) {

            $request = Request::get('post');

            if (CSRFToken::verifyCSRFToken($request->token)) {


                // policy that is applied to name field
                $rules = [
                    'name'  => [
                        'required'      => true,
                        'minLength'     => 3,
                        'maxLength'     => 10,
                        'string'        => true,
                        'unique'        => 'categories'
                    ]
                ];

                $validator = new ValidateRequest;
                $validator->abide($_POST, $rules);

                if ($validator->hasErrors()) {

                    $validationErrors = $validator->getErrors();

                    echo "Validation Errors" . "</br></br>";

                    var_dump($validationErrors);

                    exit;
                } else {

                    echo "No Validation Errors";
                }

                Category::create([
                    'name' => $request->name,
                    'slug' => slug($request->name)
                ]);

                $categories = Category::all();

                $message = 'Category Created';

                return view('/admin/products/categories', compact('categories', 'message'));
            }

            throw new \Exception('Token mismatch');
        }

    }

}