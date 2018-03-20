
<div class="row expanded">

    @if( isset($errors) )

        <div class="callout alert" data-closable>

            <!-- loop through validation error and display. -->

            @foreach($errors as $error_array)

                @foreach($error_array as $error_item)

                    {{ $error_item }} <br/>

                @endforeach

            @endforeach

            <!-- close button -->
            <div class="close-button" type="button" data-close>
                <span>&times;</span>
            </div>

        </div>

    @endif

    @if( isset($success) )

            <div class="callout success" data-closable>

                {{ $success }}

                <!-- close button -->
                <div class="close-button" type="button" data-close>
                    <span>&times;</span>
                </div>

            </div>

        @endif


</div>