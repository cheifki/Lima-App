<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


    <section class="product_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center ">
                <h2>Our <span>products</span></h2>
            </div>
        </div>

        <div class="row">
        @foreach($product as $product)
            <div class="col-xs-18 col-sm-6 col-md-4" style="margin-top:10px;">
                <div class="img_thumbnail productlist">
                    <img src="{{ asset('img') }}/{{ $product->photo }}" class="img-fluid">
                    <div class="caption">
                        <h4>{{ $product->product_name }}</h4>
                        <p>{{ $product->product_description }}</p>
                        <p><strong>Price: </strong> ${{ $product->price }}</p>
                        <p class="btn-holder">
                            <a href="#" class="btn btn-primary btn-block text-center book-btn" role="button">
                                Book a tractor
                            </a>
                        </p>
                        <div class="booking-form" style="display: none;">
                            <h3 class="text-center">Book a Tractor</h3>
                            <form action="{{ route('add_to_cart', ['id' => $product->id]) }}" method="GET">

                                @csrf
                                <!-- Form fields and submit button -->
                                <div class="form-group">
                                    <label for="tractor">Select Tractor:</label>
                                    <select id="tractor" name="tractor" class="form-control">
                                        <option value="{{ $product->id }}">{{ $product->title }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="date">Date:</label>
                                    <input type="date" id="date" name="date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="time">Time:</label>
                                    <input type="time" id="time" name="time" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="location">Location:</label>
                                    <input type="text" id="location" name="location" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="instructions">Additional Instructions:</label>
                                    <textarea id="instructions" name="instructions" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Book Tractor</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           @endforeach
        </div>
    </section>

    <script>
        const bookButtons = document.querySelectorAll('.book-btn');
        bookButtons.forEach(button => {
            button.addEventListener('click', () => {
                const bookingForm = button.parentElement.nextElementSibling;
                bookingForm.style.display = (bookingForm.style.display === 'none') ? 'block' : 'none';
            });
        });
    </script>
</x-app-layout>
 