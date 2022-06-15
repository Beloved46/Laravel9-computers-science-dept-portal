<x-guest-layout>
	<body class="is-preload landing  min-h-screen flex flex-col sm:justify-center items-center">
		<div id="page-wrapper">
            <section>
                <h2>Profile</h2>
                <form method="post" action="#">
                    <div class="">
                        <div class="col-6 col-12-xsmall">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}"  />
                        </div>
                        <div class="col-6 col-12-xsmall">
                            <label for="surname">surname</label>
                            <input type="text" name="surname" id="surname" value="{{ Auth::user()->surname  }}"  />
                        </div>
                        <div class="col-6 col-12-xsmall formin">
                            <label for="surname">Email</label>
                            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}"  />
                        
                        </div>
                        <div class="col-12 formin">
                            <select name="category" id="category">
                                <option value="">- Level -</option>
                                <option value="1">100L</option>
                                <option value="1">200L</option>
                                <option value="1">300L</option>
                                <option value="1">400L</option>
                            </select>
                        </div>
                        
                        <div class="col-12">
                            <ul class="actions">
                                <li><input type="submit" value="Update" class="primary" /></li>
                                <li><input type="reset" value="Back" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    
</x-guest-layout>