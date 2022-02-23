    <div style="float: left; margin-right: 50px;">
        <a title="upload product image" id="upload_product_image">
            <img src="{{asset( 'pics/'.($product[0]->picture ?? 'si2.png'))}}" alt="" srcset="" style="width: 256px; height: 355px; border-radius: 8px;">
        </a>
        <input type="file" name="product_image" id="product_image" accept="image/*" value="{{$product[0]->picture ?? ''}}" style="visibility: hidden; display: block;">
        @error('product_image')
        <p>{{$message}}</p>
        @enderror
    </div>
    <div style="width: 594px; overflow:hidden;">
        <!-- target gendar -->
        <div class="input-section">
            <label for="">Product Target</label>
            <select id="product_targets">
                @foreach($targets as $target)
                    <option value="{{$target->name}}">{{$target->name}}</option>
                @endforeach
            </select>
        </div>
        <!-- category gendar -->
        <div class="input-section">
            <label for="">Product category</label>
            @php
                $first_select = true;
                $hide_stmt = "style='display:none;'";
            @endphp
            @foreach($targets as $target)
                <select class="product_categories" @php
                    if ( $first_select == false)
                        echo $hide_stmt;
                    else
                        $first_select = false;
                @endphp
                data-target="{{$target->name}}">
                    @foreach($categories as $category)
                        @if($category->target == $target->id)
                            <option value="{{$category->name}}" >{{$category->name}}</option>
                        @endif
                    @endforeach
                </select>
            @endforeach
        </div>
        <!-- name -->
        <div class="input-section">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" id="product_name" value="{{$product[0]->name ?? ''}}">
        </div>
        <!-- description -->
        <div class="input-section">
            <label for="product_desc">Product Description</label>
            <textarea type="text" name="product_desc" id="product_desc" maxlength="300" >{{$product[0]->description ?? ''}}</textarea>
        </div>
        <!-- price -->
        <div class="input-section">
            <div class="half first">
                <label for="product_price">Product Price
                    <strong>Before Discount</strong>
                </label>
                <input type="number" name="product_price" id="product_price" value="{{$product[0]->price ?? '1'}}" min="1">
            </div>
            <div class="half">
                <label for="product_price">Product Price
                    <strong>After Discount</strong>
                </label>
                <input type="number" name="product_total_price" id="product_total_price"  value="{{$product[0]->total_price ?? '1'}}" min="1">
            </div>
        </div>
        <!-- product quantity    -->
        <div class="input-section">
            <label for="product_quantity">Product Quantity</label>
            <input type="number" name="product_quantity" id="product_quantity" value="{{$stock[0]->quantity ?? '1'}}" min="1">
        </div>
        <!-- product colors -->
        <!-- target gendar -->
        <div class="input-section">
            <label for="">Product Color</label><i class='fa fa-circle' id="selected-color"></i>
            <select id="product_color">
                @foreach($colors as $color)
                    <option value="{{$color->value}}"
                        @if(isset($stock) && $stock[0]->color == $color->id)
                                {{'selected'}}
                        @endif
                    >{{$color->name}}</option>
                @endforeach
            </select>
        </div>
        <!-- product sizes -->
        <div class="input-section">
            <label>Product Size</label>
            <select id="product_size">
                @foreach($sizes as $size)
                    <option value="{{$size->name}}"
                        @if(isset($stock) && $stock[0]->size == $size->id)
                            {{'selected'}}
                        @endif
                    >{{$size->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    @csrf
    @if($errors->any())
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    @endif