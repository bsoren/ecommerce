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

    public $categories = [];
    public $links =[];
    public $errors = [];

    private $num_of_records_in_page = 5;

    public $table_name = 'categories';

    public function __construct() {

        $total_records = Category::all()->count();
        $catgoryObject = new Category();

        list($this->categories, $this->links)
            = paginate($this->num_of_records_in_page, $total_records, $this->table_name, $catgoryObject);
    }


    public function show() {

        return view('admin/products/categories',[

            'categories' => $this->categories,
            'links'      => $this->links

        ]);
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

                    return view('admin/products/categories',[

                        'categories' => $this->categories,
                        'links'      => $this->links,
                        'errors'     => $validationErrors

                    ]);

                } else {

                    echo "No Validation Errors";
                }

                Category::create([
                    'name' => $request->name,
                    'slug' => slug($request->name)
                ]);

                $total_records = Category::all()->count();
                $catgoryObject = new Category();
                list($this->categories, $this->links)
                    = paginate($this->num_of_records_in_page, $total_records, $this->table_name, $catgoryObject);

                return view('admin/products/categories',[

                    'categories' => $this->categories,
                    'links'      => $this->links,
                    'success'    => "Category Created!"

                ]);
            }

            throw new \Exception('Token mismatch');
        }

    }

}