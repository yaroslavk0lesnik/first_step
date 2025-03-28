@extends('layouts.admin')

@section('content')




                <div class="content-wrapper">
                    <div class="container-xxl  ">

                        <div class="authentication-wrapper authentication-basic container-p-y">
                            <div class="authentication-inner ">
                                <!-- Register Card -->
                                <div class="card px-sm-6 px-0 ">
                                    <div class="card-body ">
                                        <!-- Logo -->

                                        <!-- /Logo -->
                                        <h4 class="mb-1">Adventure starts here 🚀</h4>
                                        <p class="mb-6">Make your app management easy and fun!</p>

                                        <form method="POST" action="{{ route('admin.register') }}">
                                            @csrf


                                            <div>
                                                <x-input-label for="name" :value="__('Name')" />
                                                <x-text-input id="name" class=" form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                            </div>

                                            <div class="mt-4">
                                                <x-input-label for="email" :value="__('Email')" />
                                                <x-text-input id="email" class=" form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>

                                            <div class="mt-4">
                                                <x-input-label for="password" :value="__('Password')" />

                                                <x-text-input id="password" class=" form-control"
                                                              type="password"
                                                              name="password"
                                                              required autocomplete="new-password" />

                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>

                                            <div class="mt-4">
                                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                                <x-text-input id="password_confirmation" class=" form-control"
                                                              type="password"
                                                              name="password_confirmation" required autocomplete="new-password" />

                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                            </div>

                                            <div class="flex items-center justify-end mt-4">
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                                    {{ __('Already registered?') }}
                                                </a>

                                                <x-primary-button class="ms-4">
                                                    {{ __('Register') }}
                                                </x-primary-button>
                                            </div>
                                        </form>


                                    </div>

                                </div>




                                <!-- Register Card -->
                            </div>
                        </div>

                    </div>
                </div>



@endsection
