<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <!-- <div>
            <x-input-label for="current_password" :value="__('Current Password')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div> -->

        <!-- Current Password -->

        <div class="mb-3 form-password-toggle">
            <label class="form-label" for="current_password" value="{{__('Current Password')}}">Current Password</label>

            <div class="input-group input-group-merge">
                    <input
                      type="password"  
                      id="current_password"
                      class="form-control"
                      name="current_password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="current_password"
                      required autocomplete="current_password"
                      messages="$errors->updatePassword->get('current_password')"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>

        </div>






        <!-- <div>
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div> -->

        <!-- New Password -->

        <div class="mb-3 form-password-toggle">
            <label class="form-label" for="password" value="{{__('New Password')}}">New Password</label>

            <div class="input-group input-group-merge">
                    <input
                      type="password"  
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                      required autocomplete="new_password"
                      :messages="$errors->updatePassword->get('password')"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>

        </div>





        <!-- <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div> -->


        <!-- Confirm Password -->
        <div class="mb-3">

            <label class="form-label" for="password_confirmation" value="{{__('Confirm Password')}}">Confirm Password</label>

             <div class="input-group input-group-merge">
                    <input
                      type="password"  
                      id="password_confirmation"
                      class="form-control"
                      name="password_confirmation"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                      required autocomplete="new-password"
                      :messages="$errors->get('password_confirmation')"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
            </div>

        </div>



        <div class="flex items-center gap-4">
            <x-primary-button class="btn btn-primary">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
