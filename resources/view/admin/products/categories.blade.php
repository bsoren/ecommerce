@extends('admin.layouts.base')

@section('title','Product Categories')

@section('content')

    <div class="category">

        <div class="row expanded">

            <h2>Product Categories</h2>

        </div>
    </div>


    @include('includes.message')


    <div class="row expanded">

        <div class="small-12 medium-6 column">

            <form action="" method="post">

                <div class="input-group">

                    <input type="text" class="input-group-field" placeholder="Search By Name">

                    <div class="input-group-button">
                        <input type="submit" class="button" value="Search">
                    </div>
                </div>
            </form>

        </div>

        <div class="small-12 medium-5 end column">

            <form action="/admin/product/categories" method="post">

                <div class="input-group">

                    <input type="text" class="input-group-field" name="name" placeholder="Category Name">

                    <input type="hidden" name="token" value="{{ \App\classes\CSRFToken::_token() }}">

                    <div class="input-group-button">
                        <input type="submit" class="button" value="Create">
                    </div>
                </div>
            </form>

        </div>

    </div>


    <div class="row expanded">
        <div class="small-12 medium-11 column">

            @if(count($categories))

                <table class="hover">
                    <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category['id'] }}</td>
                                    <td>{{ $category['name'] }}</td>
                                    <td>{{ $category['slug'] }}</td>
                                    <!-- Eloquent returns carbon php date api (search carbon api)-->
                                    <td>{{ $category['added'] }}</td>
                                    <td width="100" class="text-right">
                                        <a data-open="item-{{$category['id']}}"><i class="fa fa-edit"></i></a>
                                        <a href="#"><i class="fa fa-times"></i></a>

                                        <!-- Edit Category Modal -->
                                        <div class="reveal" id="item-{{$category['id']}}" data-reveal>
                                            <h2>Edit Category</h2>
                                            <form>
                                                <div class="input-group">
                                                    <input type="text" name="name" value="{{$category['name']}}">
                                                    <input type="hidden" name="token" value="{{ \App\classes\CSRFToken::_token() }}">

                                                    <div>
                                                        <input type="submit" class="button update-category"
                                                               id="{{$category['id']}}" value="Update">
                                                    </div>
                                                </div>
                                            </form>

                                            <button class="close-button" data-close aria-label="Close modal" type="button">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                </table>

                {!! $links !!}
            @else

                <h3>You have not created my category</h3>

            @endif
        </div>


        <p><button class="button" data-open="exampleModal1">Click me for a modal</button></p>



        <div class="reveal" id="exampleModal1" data-reveal>

            <h1>Awesome. I Have It.</h1>

            <p class="lead">Your couch. It is mine.</p>

            <p>I'm a cool paragraph that lives inside of an even cooler modal. Wins!</p>

            <button class="close-button" data-close aria-label="Close modal" type="button">

                <span aria-hidden="true">&times;</span>

            </button>

        </div>

    </div>

@endsection