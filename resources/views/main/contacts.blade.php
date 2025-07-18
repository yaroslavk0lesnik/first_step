<x-app-layout>

        <section class="breadcrumbs-custom bg-image context-dark slider-page" style="background-image: url({{ asset('images/bg-6.webp') }}");  data-preset='{"title":"Breadcrumbs","category":"header","reload":false,"id":"breadcrumbs"}'>
            <div class="container">
                <h2 class="breadcrumbs-custom-title">@lang('global.pages.contacts')</h2>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="{{ route('main.index') }}">@lang('global.pages.index')</a></li>
                    <li class="active"><a href="{{ route('main.contacts') }}">@lang('global.pages.contacts')</a></li>
                </ul>
            </div>
        </section>

        <section class="section section-lg bg-default">
            <div class="container">
                <div class="row justify-content-sm-center">
                    <div class="col-md-9 col-lg-8 col-xl-12">
                        <div class="row">
                            <div class="col-xl-8 text-start">
                                <h3>@lang('frontend/contacts.contact.title')</h3>
                                <div>
                                    <p class="gray">@lang('frontend/contacts.contact.description')</p>
                                </div>
                                <div class="offset-top-34">
                                    <form class="rd-mailform text-start" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php" novalidate="novalidate">
                                        <div class="row justify-content-sm-center">
                                            <div class="col-md-6">
                                                <div class="form-wrap form-wrap-label-outside">
                                                    <label class="form-label form-label-outside text-dark rd-input-label" for="contacts-first-name">@lang('frontend/contacts.contact.form.name.label')</label>
                                                    <input class="form-input form-input-last-child" id="contacts-first-name" type="text" name="first-name" data-constraints=""><span class="form-validation"></span>
                                                </div>
                                                <div class="form-wrap form-wrap-label-outside offset-top-20">
                                                    <label class="form-label form-label-outside text-dark rd-input-label" for="contacts-email">E-mail</label>
                                                    <input class="form-input form-input-last-child" id="contacts-email" type="email" name="email" data-constraints=""><span class="form-validation"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 offset-top-20 offset-sm-top-0">
                                                <div class="form-wrap form-wrap-label-outside">
                                                    <label class="form-label form-label-outside text-dark rd-input-label" for="contacts-last-name">@lang('frontend/contacts.contact.form.surname.label')</label>
                                                    <input class="form-input form-input-last-child" id="contacts-last-name" type="text" name="last-name" data-constraints=""><span class="form-validation"></span>
                                                </div>
                                                <div class="form-wrap form-wrap-label-outside offset-top-20">
                                                    <label class="form-label form-label-outside text-dark rd-input-label" for="contacts-phone">@lang('frontend/contacts.contact.form.phone.label')</label>
                                                    <input class="form-input form-input-last-child" id="contacts-phone" type="text" name="last-name" data-constraints=""><span class="form-validation"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-wrap form-wrap-label-outside offset-top-20">
                                            <label class="form-label form-label-outside text-dark rd-input-label" for="contacts-message">@lang('frontend/contacts.contact.form.message.label')</label>
                                            <textarea class="form-input form-input-last-child" id="contacts-message" name="message" data-constraints="" style="max-height: 150px;"></textarea><span class="form-validation"></span>
                                        </div>
                                        <div class="offset-top-18 offset-sm-top-24 text-center text-md-start">

                                            <p class="gray">@lang('frontend/contacts.contact.form.agreement')</p>
                                            <button class="btn btn-ellipse btn-primary" type="submit" style="min-width: 130px;">@lang('frontend/contacts.contact.form.send')</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-4 text-start offset-top-66 offset-lg-top-0">
                                <div class="inset-xl-left-40">
                                    <div>
                                        <h6>@lang('frontend/contacts.blocks.social_networks.title')</h6>
                                        <hr class="text-subline">
                                        <ul class="list-inline">
                                            <li><a class="icon fa fa-facebook icon-xxs icon-circle icon-gray-light" href="#"></a></li>
                                            <li><a class="icon fa fa-twitter icon-xxs icon-circle icon-gray-light" href="#"></a></li>
                                            <li><a class="icon fa fa-google-plus icon-xxs icon-circle icon-gray-light" href="#"></a></li>
                                            <li><a class="icon fa fa-rss icon-xxs icon-circle icon-gray-light" href="#"></a></li>
                                        </ul>
                                    </div>
                                    <div class="offset-top-60">
                                        <h6>@lang('frontend/contacts.blocks.address.title')</h6>
                                        <hr class="text-subline">
                                        <div class="offset-top-20">
                                            <div class="unit flex-row unit-spacing-xxs p">
                                                <div class="unit-left">
                                                    <div class="icon icon-xxs text-middle mdi mdi-map-marker text-primary"></div>
                                                </div>
                                                <div class="unit-body">
                                                    <p><a class="text-gray-dark" href="#">@lang('frontend/contacts.blocks.address.full_address')
                                                            <br> @lang('frontend/contacts.blocks.address.only_street') </a></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offset-top-60">
                                        <h6>@lang('frontend/contacts.blocks.time_to_work.title')</h6>
                                        <hr class="text-subline">
                                        <div class="offset-top-20">
                                            <div class="unit flex-row unit-spacing-xxs p">
                                                <div class="unit-left">
                                                    <div class="icon icon-xxs text-middle mdi mdi-calendar-clock text-primary"></div>
                                                </div>
                                                <div class="unit-body">
                                                    <div>@lang('frontend/contacts.blocks.time_to_work.value')</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offset-top-60">
                                        <h6> @lang('frontend/contacts.blocks.phones.title')</h6>
                                        <hr class="text-subline">
                                        <div class="offset-top-20">
                                            <div class="unit flex-row unit-spacing-xxs p">
                                                <div class="unit-left">
                                                    <div class="icon icon-xxs text-middle mdi mdi-phone text-primary"></div>
                                                </div>
                                                <div class="unit-body">
                                                    <a class="text-dark d-block" href="tel:#">0 (800) 317-317</a>
                                                    <a class="text-dark d-block" href="tel:#">(057) 761-61-31</a>
                                                    <a class="text-dark d-block" href="tel:#">(093) 761-61-31</a>
                                                    <a class="text-dark d-block" href="tel:#">(099) 548-44-85</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="offset-top-60">
                                        <h6>e-mail</h6>
                                        <hr class="text-subline">
                                        <div class="offset-top-20">
                                            <div class="unit flex-row unit-spacing-xxs p">
                                                <div class="unit-left">
                                                    <div class="icon icon-xxs text-middle mdi mdi-email-outline text-primary"></div>
                                                </div>
                                                <div class="unit-body"><a class="text-dark" href="mailto:#">info@demolink.org</a></div>
                                            </div>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <section class="section">
        <!--Please, add the data attribute data-key="YOUR_API_KEY" in order to insert your own API key for the Google map.-->
        <!--Please note that YOUR_API_KEY should replaced with your key.-->
        <!--Example: <div class="google-map-container" data-key="YOUR_API_KEY">-->
        <div  data-center="Медицинский центр Докарт (клиника Ок Центр)" data-zoom="5" >
            <div class="google-map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2564.105976527954!2d36.24050249288963!3d50.00936884557607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4127a0e56e275b2f%3A0x42bbbee2ee570576!2z0JzQtdC00LjRhtC40L3RgdC60LjQuSDRhtC10L3RgtGAINCU0L7QutCw0YDRgiAo0LrQu9C40L3QuNC60LAg0J7QuiDQptC10L3RgtGAKQ!5e0!3m2!1sru!2sua!4v1743058892159!5m2!1sru!2sua&gestureHandling=greedy"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <ul class="google-map-markers">
                <li data-location="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-description="9870 St Vincent Place, Glasgow"></li>
            </ul>
        </div>
    </section>

</x-app-layout>
