@extends('frontend.layout')
@section('content-area')

<main class="">
    <div class="header-image-wrapper">
        <div class="bg" style="background-image: asset('home2/assets/images/others/about.jpg');"></div>
        <div class="mask"></div>
        <div class="header-image-content mh-200">
            <p class="desc">“Home is where one starts from...” –AqaryClick</p>
        </div>
    </div>
    <div class="px-3">
        <div class="theme-container">
            <div class="page-drawer-container mt-3">
                <aside class="mdc-drawer page-sidenav mdc-drawer--dismissible mdc-drawer--open">
                    <a href="#" class="h-0"></a>
                    <div class="mdc-card">
                        <form action="javascript:void(0);" id="filters" class="search-wrapper m-0 o-hidden">
                            <div class="column p-2">
                                <div class="col-xs-12 p-2">
                                    <div class="mdc-select mdc-select--outlined">
                                        <div class="mdc-select__anchor">
                                            <i class="mdc-select__dropdown-icon"></i>
                                            <div class="mdc-select__selected-text" tabindex="0" aria-disabled="false" aria-expanded="false"></div>
                                            <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch" style="">
                                                    <label class="mdc-floating-label" style="">Property Type</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div>
                                        <div class="mdc-select__menu mdc-menu mdc-menu-surface" style="transform-origin: center top; left: 0px; top: 50px; max-height: 231px;">
                                            <ul class="mdc-list">
                                                <li class="mdc-list-item mdc-list-item--selected" data-value="" tabindex="0" aria-selected="true"></li>
                                                <li class="mdc-list-item" data-value="1" tabindex="-1">Office</li>
                                                <li class="mdc-list-item" data-value="2" tabindex="-1">House</li>
                                                <li class="mdc-list-item" data-value="3" tabindex="-1">Apartment</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 p-2">
                                    <div class="mdc-select mdc-select--outlined">
                                        <div class="mdc-select__anchor">
                                            <i class="mdc-select__dropdown-icon"></i>
                                            <div class="mdc-select__selected-text" tabindex="0" aria-disabled="false" aria-expanded="false"></div>
                                            <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch" style="">
                                                    <label class="mdc-floating-label" style="">Property Status</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div>
                                        <div class="mdc-select__menu mdc-menu mdc-menu-surface" style="transform-origin: center bottom; left: 0px; bottom: 50px; max-height: 340px;">
                                            <ul class="mdc-list">
                                                <li class="mdc-list-item mdc-list-item--selected" data-value="" tabindex="0" aria-selected="true"></li>
                                                <li class="mdc-list-item" data-value="1" tabindex="-1">For Sale</li>
                                                <li class="mdc-list-item" data-value="2" tabindex="-1">For Rent</li>
                                                <li class="mdc-list-item" data-value="3" tabindex="-1">Open House</li>
                                                <li class="mdc-list-item" data-value="4" tabindex="-1">No Fees</li>
                                                <li class="mdc-list-item" data-value="5" tabindex="-1">Hot Offer</li>
                                                <li class="mdc-list-item" data-value="6" tabindex="-1">Sold</li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xs-6 p-2">
                                        <div class="mdc-text-field mdc-text-field--outlined">
                                            <input class="mdc-text-field__input">
                                            <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch" style="">
                                                    <label class="mdc-floating-label" style="">Price From</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 p-2 to">
                                        <div class="mdc-text-field mdc-text-field--outlined">
                                            <input class="mdc-text-field__input">
                                            <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch" style="">
                                                    <label class="mdc-floating-label" style="">Price To</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 p-2">
                                    <div class="mdc-select mdc-select--outlined mdc-select--focused mdc-select--activated">
                                        <div class="mdc-select__anchor">
                                            <i class="mdc-select__dropdown-icon"></i>
                                            <div class="mdc-select__selected-text" tabindex="0" aria-disabled="false" aria-expanded="true"></div>
                                            <div class="mdc-notched-outline mdc-notched-outline--upgraded mdc-notched-outline--notched">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch" style="width: 28.25px;">
                                                    <label class="mdc-floating-label mdc-floating-label--float-above" style="">City</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div>
                                        <div class="mdc-select__menu mdc-menu mdc-menu-surface mdc-menu-surface--open" style="transform-origin: center bottom; left: 0px; bottom: 50px; max-height: 472px;">
                                            <ul class="mdc-list">
                                                <li class="mdc-list-item mdc-list-item--selected" data-value="" tabindex="0" aria-selected="true"></li>
                                                <li class="mdc-list-item" data-value="1" tabindex="-1">New York</li>
                                                <li class="mdc-list-item" data-value="2" tabindex="-1">Chicago</li>
                                                <li class="mdc-list-item" data-value="3" tabindex="-1">Los Angeles</li>
                                                <li class="mdc-list-item" data-value="4" tabindex="-1">Seattle</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 p-2">
                                    <div class="mdc-text-field mdc-text-field--outlined">
                                        <input class="mdc-text-field__input">
                                        <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <label class="mdc-floating-label" style="">Zip Code</label>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 p-2">
                                    <div class="mdc-select mdc-select--outlined">
                                        <div class="mdc-select__anchor">
                                            <i class="mdc-select__dropdown-icon"></i>
                                            <div class="mdc-select__selected-text" tabindex="0" aria-disabled="false"></div>
                                            <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label" style="">Neighborhood</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div>
                                        <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                            <ul class="mdc-list">
                                                <li class="mdc-list-item mdc-list-item--selected" data-value="" tabindex="-1" aria-selected="true"></li>
                                                <li class="mdc-list-item" data-value="1" tabindex="-1">Astoria</li>
                                                <li class="mdc-list-item" data-value="2" tabindex="-1">Midtown</li>
                                                <li class="mdc-list-item" data-value="3" tabindex="-1">Chinatown</li>
                                                <li class="mdc-list-item" data-value="4" tabindex="-1">Austin</li>
                                                <li class="mdc-list-item" data-value="5" tabindex="-1">Englewood</li>
                                                <li class="mdc-list-item" data-value="6" tabindex="-1">Riverdale</li>
                                                <li class="mdc-list-item" data-value="7" tabindex="-1">Hollywood</li>
                                                <li class="mdc-list-item" data-value="8" tabindex="-1">Sherman Oaks</li>
                                                <li class="mdc-list-item" data-value="9" tabindex="-1">Highland Park</li>
                                                <li class="mdc-list-item" data-value="10" tabindex="-1">Belltown</li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 p-2">
                                    <div class="mdc-select mdc-select--outlined">
                                        <div class="mdc-select__anchor">
                                            <i class="mdc-select__dropdown-icon"></i>
                                            <div class="mdc-select__selected-text" tabindex="0" aria-disabled="false"></div>
                                            <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label" style="">Street</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div>
                                        <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                            <ul class="mdc-list">
                                                <li class="mdc-list-item mdc-list-item--selected" data-value="" tabindex="-1" aria-selected="true"></li>
                                                <li class="mdc-list-item" data-value="1" tabindex="-1">Astoria Street #1</li>
                                                <li class="mdc-list-item" data-value="2" tabindex="-1">Astoria Street #2</li>
                                                <li class="mdc-list-item" data-value="3" tabindex="-1">Midtown Street #1</li>
                                                <li class="mdc-list-item" data-value="4" tabindex="-1">Midtown Street #2</li>
                                                <li class="mdc-list-item" data-value="5" tabindex="-1">Chinatown Street #1</li>
                                                <li class="mdc-list-item" data-value="6" tabindex="-1">Chinatown Street #2</li>
                                                <li class="mdc-list-item" data-value="7" tabindex="-1">Austin Street #1</li>
                                                <li class="mdc-list-item" data-value="8" tabindex="-1">Austin Street #2</li>
                                                <li class="mdc-list-item" data-value="9" tabindex="-1">Englewood Street #1</li>
                                                <li class="mdc-list-item" data-value="10" tabindex="-1">Englewood Street #2</li>
                                                <li class="mdc-list-item" data-value="11" tabindex="-1">Riverdale Street #1</li>
                                                <li class="mdc-list-item" data-value="12" tabindex="-1">Riverdale Street #2</li>
                                                <li class="mdc-list-item" data-value="13" tabindex="-1">Hollywood Street #1</li>
                                                <li class="mdc-list-item" data-value="14" tabindex="-1">Hollywood Street #2</li>
                                                <li class="mdc-list-item" data-value="15" tabindex="-1">Sherman Oaks Street #1</li>
                                                <li class="mdc-list-item" data-value="16" tabindex="-1">Sherman Oaks Street #2</li>
                                                <li class="mdc-list-item" data-value="17" tabindex="-1">Highland Park Street #1</li>
                                                <li class="mdc-list-item" data-value="18" tabindex="-1">Highland Park Street #2</li>
                                                <li class="mdc-list-item" data-value="19" tabindex="-1">Belltown Street #1</li>
                                                <li class="mdc-list-item" data-value="20" tabindex="-1">Belltown Street #2</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 p-2">
                                        <div class="mdc-select mdc-select--outlined">
                                            <div class="mdc-select__anchor">
                                                <i class="mdc-select__dropdown-icon"></i>
                                                <div class="mdc-select__selected-text" tabindex="0" aria-disabled="false" aria-expanded="false"></div>
                                                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch" style="">
                                                        <label class="mdc-floating-label" style="">Bedrooms From</label>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </div>
                                            <div class="mdc-select__menu mdc-menu mdc-menu-surface" style="transform-origin: center bottom; left: 0px; bottom: 50px; max-height: 275.2px;">
                                                <ul class="mdc-list">
                                                    <li class="mdc-list-item mdc-list-item--selected" data-value="" tabindex="0" aria-selected="true"></li>
                                                    <li class="mdc-list-item" data-value="1" tabindex="-1">1</li>
                                                    <li class="mdc-list-item" data-value="2" tabindex="-1">2</li>
                                                    <li class="mdc-list-item" data-value="3" tabindex="-1">3</li>
                                                    <li class="mdc-list-item" data-value="4" tabindex="-1">4</li>
                                                    <li class="mdc-list-item" data-value="5" tabindex="-1">5</li>
                                                    <li class="mdc-list-item" data-value="6" tabindex="-1">6</li>
                                                    <li class="mdc-list-item" data-value="7" tabindex="-1">7</li>
                                                    <li class="mdc-list-item" data-value="8" tabindex="-1">8</li>
                                                    <li class="mdc-list-item" data-value="9" tabindex="-1">9</li>
                                                    <li class="mdc-list-item" data-value="10" tabindex="-1">10</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 p-2 to">
                                        <div class="mdc-select mdc-select--outlined">
                                            <div class="mdc-select__anchor">
                                                <i class="mdc-select__dropdown-icon"></i>
                                                <div class="mdc-select__selected-text" tabindex="0" aria-disabled="false" aria-expanded="false"></div>
                                                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch" style="">
                                                        <label class="mdc-floating-label" style="">Bedrooms To</label>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </div>
                                            <div class="mdc-select__menu mdc-menu mdc-menu-surface" style="transform-origin: center bottom; left: 0px; bottom: 50px; max-height: 275.2px;">
                                                <ul class="mdc-list">
                                                    <li class="mdc-list-item mdc-list-item--selected" data-value="" tabindex="0" aria-selected="true"></li>
                                                    <li class="mdc-list-item" data-value="1" tabindex="-1">1</li>
                                                    <li class="mdc-list-item" data-value="2" tabindex="-1">2</li>
                                                    <li class="mdc-list-item" data-value="3" tabindex="-1">3</li>
                                                    <li class="mdc-list-item" data-value="4" tabindex="-1">4</li>
                                                    <li class="mdc-list-item" data-value="5" tabindex="-1">5</li>
                                                    <li class="mdc-list-item" data-value="6" tabindex="-1">6</li>
                                                    <li class="mdc-list-item" data-value="7" tabindex="-1">7</li>
                                                    <li class="mdc-list-item" data-value="8" tabindex="-1">8</li>
                                                    <li class="mdc-list-item" data-value="9" tabindex="-1">9</li>
                                                    <li class="mdc-list-item" data-value="10" tabindex="-1">10</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 p-2">
                                        <div class="mdc-select mdc-select--outlined">
                                            <div class="mdc-select__anchor">
                                                <i class="mdc-select__dropdown-icon"></i>
                                                <div class="mdc-select__selected-text" tabindex="0" aria-disabled="false"></div>
                                                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                        <label class="mdc-floating-label" style="">Bathrooms From</label>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </div>
                                            <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                                <ul class="mdc-list">
                                                    <li class="mdc-list-item mdc-list-item--selected" data-value="" tabindex="-1" aria-selected="true"></li>
                                                    <li class="mdc-list-item" data-value="1" tabindex="-1">1</li>
                                                    <li class="mdc-list-item" data-value="2" tabindex="-1">2</li>
                                                    <li class="mdc-list-item" data-value="3" tabindex="-1">3</li>
                                                    <li class="mdc-list-item" data-value="4" tabindex="-1">4</li>
                                                    <li class="mdc-list-item" data-value="5" tabindex="-1">5</li>
                                                    <li class="mdc-list-item" data-value="6" tabindex="-1">6</li>
                                                    <li class="mdc-list-item" data-value="7" tabindex="-1">7</li>
                                                    <li class="mdc-list-item" data-value="8" tabindex="-1">8</li>
                                                    <li class="mdc-list-item" data-value="9" tabindex="-1">9</li>
                                                    <li class="mdc-list-item" data-value="10" tabindex="-1">10</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 p-2 to">
                                        <div class="mdc-select mdc-select--outlined">
                                            <div class="mdc-select__anchor">
                                                <i class="mdc-select__dropdown-icon"></i>
                                                <div class="mdc-select__selected-text" tabindex="0" aria-disabled="false"></div>
                                                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                        <label class="mdc-floating-label" style="">Bathrooms To</label>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </div>
                                            <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                                <ul class="mdc-list">
                                                    <li class="mdc-list-item mdc-list-item--selected" data-value="" tabindex="-1" aria-selected="true"></li>
                                                    <li class="mdc-list-item" data-value="1" tabindex="-1">1</li>
                                                    <li class="mdc-list-item" data-value="2" tabindex="-1">2</li>
                                                    <li class="mdc-list-item" data-value="3" tabindex="-1">3</li>
                                                    <li class="mdc-list-item" data-value="4" tabindex="-1">4</li>
                                                    <li class="mdc-list-item" data-value="5" tabindex="-1">5</li>
                                                    <li class="mdc-list-item" data-value="6" tabindex="-1">6</li>
                                                    <li class="mdc-list-item" data-value="7" tabindex="-1">7</li>
                                                    <li class="mdc-list-item" data-value="8" tabindex="-1">8</li>
                                                    <li class="mdc-list-item" data-value="9" tabindex="-1">9</li>
                                                    <li class="mdc-list-item" data-value="10" tabindex="-1">10</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 p-2">
                                        <div class="mdc-select mdc-select--outlined">
                                            <div class="mdc-select__anchor">
                                                <i class="mdc-select__dropdown-icon"></i>
                                                <div class="mdc-select__selected-text" tabindex="0" aria-disabled="false"></div>
                                                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                        <label class="mdc-floating-label" style="">Garages From</label>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </div>
                                            <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                                <ul class="mdc-list">
                                                    <li class="mdc-list-item mdc-list-item--selected" data-value="" tabindex="-1" aria-selected="true"></li>
                                                    <li class="mdc-list-item" data-value="1" tabindex="-1">1</li>
                                                    <li class="mdc-list-item" data-value="2" tabindex="-1">2</li>
                                                    <li class="mdc-list-item" data-value="3" tabindex="-1">3</li>
                                                    <li class="mdc-list-item" data-value="4" tabindex="-1">4</li>
                                                    <li class="mdc-list-item" data-value="5" tabindex="-1">5</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 p-2 to">
                                        <div class="mdc-select mdc-select--outlined">
                                            <div class="mdc-select__anchor">
                                                <i class="mdc-select__dropdown-icon"></i>
                                                <div class="mdc-select__selected-text" tabindex="0" aria-disabled="false"></div>
                                                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                        <label class="mdc-floating-label" style="">Garages To</label>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </div>
                                            <div class="mdc-select__menu mdc-menu mdc-menu-surface">
                                                <ul class="mdc-list">
                                                    <li class="mdc-list-item mdc-list-item--selected" data-value="" tabindex="-1" aria-selected="true"></li>
                                                    <li class="mdc-list-item" data-value="1" tabindex="-1">1</li>
                                                    <li class="mdc-list-item" data-value="2" tabindex="-1">2</li>
                                                    <li class="mdc-list-item" data-value="3" tabindex="-1">3</li>
                                                    <li class="mdc-list-item" data-value="4" tabindex="-1">4</li>
                                                    <li class="mdc-list-item" data-value="5" tabindex="-1">5</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 p-2">
                                        <div class="mdc-text-field mdc-text-field--outlined">
                                            <input class="mdc-text-field__input">
                                            <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label" style="">Area From</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 p-2 to">
                                        <div class="mdc-text-field mdc-text-field--outlined">
                                            <input class="mdc-text-field__input">
                                            <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label" style="">Area To</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 p-2">
                                        <div class="mdc-text-field mdc-text-field--outlined">
                                            <input class="mdc-text-field__input">
                                            <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label" style="">Year Built From</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 p-2 to">
                                        <div class="mdc-text-field mdc-text-field--outlined">
                                            <input class="mdc-text-field__input">
                                            <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                <div class="mdc-notched-outline__leading"></div>
                                                <div class="mdc-notched-outline__notch">
                                                    <label class="mdc-floating-label" style="">Year Built To</label>
                                                </div>
                                                <div class="mdc-notched-outline__trailing"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 mb-2">
                                    <p class="uppercase m-2 fw-500">Features</p>
                                    <div class="features column">
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded" style="--mdc-ripple-fg-size:24px; --mdc-ripple-fg-scale:1.66667; --mdc-ripple-left:8px; --mdc-ripple-top:8px;">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id="air-conditioning">
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div>
                                            <label for="air-conditioning">Air Conditioning</label>
                                        </div>
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded" style="--mdc-ripple-fg-size:24px; --mdc-ripple-fg-scale:1.66667; --mdc-ripple-left:8px; --mdc-ripple-top:8px;">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id="barbeque">
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div>
                                            <label for="barbeque">Barbeque</label>
                                        </div>
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded" style="--mdc-ripple-fg-size:24px; --mdc-ripple-fg-scale:1.66667; --mdc-ripple-left:8px; --mdc-ripple-top:8px;">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id="dryer">
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div>
                                            <label for="dryer">Dryer</label>
                                        </div>
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded" style="--mdc-ripple-fg-size:24px; --mdc-ripple-fg-scale:1.66667; --mdc-ripple-left:8px; --mdc-ripple-top:8px;">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id="microwave">
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div>
                                            <label for="microwave">Microwave</label>
                                        </div>
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded" style="--mdc-ripple-fg-size:24px; --mdc-ripple-fg-scale:1.66667; --mdc-ripple-left:8px; --mdc-ripple-top:8px;">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id="refrigerator">
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div>
                                            <label for="refrigerator">Refrigerator</label>
                                        </div>
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded" style="--mdc-ripple-fg-size:24px; --mdc-ripple-fg-scale:1.66667; --mdc-ripple-left:8px; --mdc-ripple-top:8px;">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id="tv-cable">
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div>
                                            <label for="tv-cable">TV Cable</label>
                                        </div>
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded" style="--mdc-ripple-fg-size:24px; --mdc-ripple-fg-scale:1.66667; --mdc-ripple-left:8px; --mdc-ripple-top:8px;">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id="sauna">
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div>
                                            <label for="sauna">Sauna</label>
                                        </div>
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded" style="--mdc-ripple-fg-size:24px; --mdc-ripple-fg-scale:1.66667; --mdc-ripple-left:8px; --mdc-ripple-top:8px;">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id="wi-fi">
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div>
                                            <label for="wi-fi">WiFi</label>
                                        </div>
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded" style="--mdc-ripple-fg-size:24px; --mdc-ripple-fg-scale:1.66667; --mdc-ripple-left:8px; --mdc-ripple-top:8px;">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id="fireplace">
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div>
                                            <label for="fireplace">Fireplace</label>
                                        </div>
                                        <div class="mdc-form-field">
                                            <div class="mdc-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded" style="--mdc-ripple-fg-size:24px; --mdc-ripple-fg-scale:1.66667; --mdc-ripple-left:8px; --mdc-ripple-top:8px;">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id="gym">
                                                <div class="mdc-checkbox__background">
                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                    </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div>
                                            <label for="gym">Gym</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row around-xs middle-xs p-2 mb-3">
                                <button class="mdc-button mdc-button--raised bg-warn mdc-ripple-upgraded" type="button" id="clear-filter">
                                    <span class="mdc-button__ripple"></span>
                                    <span class="mdc-button__label">Clear</span>
                                </button>
                                <button class="mdc-button mdc-button--raised mdc-ripple-upgraded" type="submit">
                                    <span class="mdc-button__ripple"></span>
                                    <i class="material-icons mdc-button__icon">search</i>
                                    <span class="mdc-button__label">Search</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </aside>
                <div class="mdc-drawer-scrim page-sidenav-scrim d-none"></div>
                <div class="page-sidenav-content">
                    <div class="properties-wrapper row mt-0">
                        <div class="row px-2 w-100">
                            <div class="row mdc-card between-xs middle-xs w-100 p-2 filter-row mdc-elevation--z1 text-muted">
                                <button id="page-sidenav-toggle" class="mdc-icon-button material-icons d-md-none d-lg-none d-xl-none">
                                    more_vert
                                </button>
                                <div class="mdc-menu-surface--anchor">
                                    <button class="mdc-button mdc-ripple-surface text-muted mutable mdc-ripple-upgraded" style="--mdc-ripple-fg-size:57px; --mdc-ripple-fg-scale:1.97911; --mdc-ripple-fg-translate-start:26.22px, 3.53995px; --mdc-ripple-fg-translate-end:19.65px, -10.5px;">
                                        <span class="mdc-button__ripple"></span>
                                        <span class="mdc-button__label"><span class="mutable">Price (Low to High)</span></span>
                                        <i class="material-icons mdc-button__icon m-0">arrow_drop_down</i>
                                    </button>
                                    <div class="mdc-menu mdc-menu-surface" style="transform-origin: left top; left: 0px; max-height: 247px; top: 36px;">
                                        <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
                                            <li class="mdc-list-item" role="menuitem" tabindex="0">
                                                <span class="mdc-list-item__text">Sort by Default</span>
                                            </li>
                                            <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                                <span class="mdc-list-item__text">Newest</span>
                                            </li>
                                            <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                                <span class="mdc-list-item__text">Oldest</span>
                                            </li>
                                            <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                                <span class="mdc-list-item__text">Popular</span>
                                            </li>
                                            <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                                <span class="mdc-list-item__text">Price (Low to High)</span>
                                            </li>
                                            <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                                <span class="mdc-list-item__text">Price (High to Low)</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row middle-xs d-none d-sm-flex d-md-flex d-lg-flex d-xl-flex">
                                    <div class="mdc-menu-surface--anchor">
                                        <button class="mdc-button mdc-ripple-surface text-muted mdc-ripple-upgraded" style="--mdc-ripple-fg-size:63px; --mdc-ripple-fg-scale:1.94017; --mdc-ripple-fg-translate-start:-3.51996px, -20.58px; --mdc-ripple-fg-translate-end:21.65px, -13.5px;">
                                            <span class="mdc-button__ripple"></span>
                                            <span class="mdc-button__label">Show<span class="mx-2 mutable">36</span></span>
                                            <i class="material-icons mdc-button__icon m-0">arrow_drop_down</i>
                                        </button>
                                        <div class="mdc-menu mdc-menu-surface" style="transform-origin: center top; left: 0px; top: 36px; max-height: 247px;">
                                            <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical" tabindex="-1">
                                                <li class="mdc-list-item" role="menuitem" tabindex="0">
                                                    <span class="mdc-list-item__text">8</span>
                                                </li>
                                                <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                                    <span class="mdc-list-item__text">12</span>
                                                </li>
                                                <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                                    <span class="mdc-list-item__text">16</span>
                                                </li>
                                                <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                                    <span class="mdc-list-item__text">24</span>
                                                </li>
                                                <li class="mdc-list-item" role="menuitem" tabindex="-1">
                                                    <span class="mdc-list-item__text">36</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <button class="mdc-icon-button material-icons view-type" data-view-type="list" data-col="1" data-full-width-page="false">view_list</button>
                                    <button class="mdc-icon-button view-type" data-view-type="grid" data-col="2" data-full-width-page="false">
                                        <svg class="material-icons mat-icon-sm" viewBox="0 0 25 25">
                                            <path d="M3,11H11V3H3M3,21H11V13H3M13,21H21V13H13M13,3V11H21V3"></path>
                                        </svg>
                                    </button>
                                    <button class="mdc-icon-button view-type material-icons d-none d-lg-flex d-xl-flex" data-view-type="grid" data-col="3" data-full-width-page="false">view_module</button>
                                </div>
                            </div>
                        </div>
                        <div class="row start-xs middle-xs py-2 w-100">
                            <div class="mdc-chip-set">
                                <div class="mdc-chip bg-warn mdc-ripple-upgraded" id="mdc-chip-1">
                                    <div class="mdc-chip__ripple"></div>
                                    <span>
                                        <span role="button" tabindex="0" class="mdc-chip__text uppercase">32 found</span>
                                    </span>
                                </div>
                                <div class="mdc-chip mdc-ripple-upgraded" id="mdc-chip-2" style="--mdc-ripple-fg-size:52px; --mdc-ripple-fg-scale:1.98057; --mdc-ripple-fg-translate-start:-2.98999px, -8.12px; --mdc-ripple-fg-translate-end:17.655px, -10px;">
                                    <div class="mdc-chip__ripple"></div>
                                    <span>
                                        <span role="button" tabindex="0" class="mdc-chip__text">House</span>
                                    </span>
                                    <span>
                                        <i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="-1" role="button">cancel</i>
                                    </span>
                                </div>
                                <div class="mdc-chip mdc-ripple-upgraded" id="mdc-chip-3" style="--mdc-ripple-fg-size:58px; --mdc-ripple-fg-scale:1.93201; --mdc-ripple-fg-translate-start:30.54px, -9.20001px; --mdc-ripple-fg-translate-end:19.455px, -13px;">
                                    <div class="mdc-chip__ripple"></div>
                                    <span>
                                        <span role="button" tabindex="0" class="mdc-chip__text">For sale</span>
                                    </span>
                                    <span>
                                        <i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="-1" role="button">cancel</i>
                                    </span>
                                </div>
                                <div class="mdc-chip mdc-ripple-upgraded" id="mdc-chip-4" style="--mdc-ripple-fg-size:86px; --mdc-ripple-fg-scale:1.83234; --mdc-ripple-fg-translate-start:-7.09003px, -30.88px; --mdc-ripple-fg-translate-end:29.035px, -27px;">
                                    <div class="mdc-chip__ripple"></div>
                                    <span>
                                        <span role="button" tabindex="0" class="mdc-chip__text">Price &gt; 150000</span>
                                    </span>
                                    <span>
                                        <i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="-1" role="button">cancel</i>
                                    </span>
                                </div>
                                <div class="mdc-chip mdc-ripple-upgraded" id="mdc-chip-5" style="--mdc-ripple-fg-size:88px; --mdc-ripple-fg-scale:1.83698; --mdc-ripple-fg-translate-start:-21.9201px, -25.48px; --mdc-ripple-fg-translate-end:30.12px, -28px;">
                                    <div class="mdc-chip__ripple"></div>
                                    <span>
                                        <span role="button" tabindex="0" class="mdc-chip__text">Price &lt; 450000</span>
                                    </span>
                                    <span>
                                        <i class="material-icons mdc-chip__icon mdc-chip__icon--trailing" tabindex="-1" role="button">cancel</i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @foreach ($buildings as $building)
                        <div class="row item col-xs-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                            <div class="mdc-card property-item grid-item column-3">
                                <div class="thumbnail-section">
                                    <div class="row property-status">
                                        <span class="green">For Sale</span>
                                    </div>
                                    <div class="property-image">
                                        <div class="swiper-container swiper-container-initialized swiper-container-horizontal" style="cursor: grab;">
                                            <div class="swiper-wrapper" style="transition: all 0ms ease 0s; transform: translate3d(-1244px, 0px, 0px);">
                                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="3" style="width: 311px;">
                                                    <img src="{{asset('$building->building_pic')}}" alt="slide image" class="slide-item swiper-lazy swiper-lazy-loaded">

                                                </div>
                                            </div>
                                            <div class="swiper-pagination white swiper-pagination-clickable swiper-pagination-bullets"><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 4"></span></div>
                                            <button class="mdc-icon-button swiper-button-prev swipe-arrow" tabindex="0" role="button" aria-label="Previous slide"><i class="material-icons mat-icon-lg">keyboard_arrow_left</i></button>
                                            <button class="mdc-icon-button swiper-button-next swipe-arrow" tabindex="0" role="button" aria-label="Next slide"><i class="material-icons mat-icon-lg">keyboard_arrow_right</i></button>
                                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                        </div>
                                    </div>
                                    <div class="control-icons">
                                        <button class="mdc-button add-to-favorite mdc-ripple-upgraded" title="Add To Favorite">
                                            <i class="material-icons mat-icon-sm">favorite_border</i>
                                        </button>
                                        <button class="mdc-button mdc-ripple-upgraded" title="Add To Compare">
                                            <i class="material-icons mat-icon-sm">compare_arrows</i>
                                        </button>
                                    </div>
                                </div>
                                <div class="property-content-wrapper">
                                    <div class="property-content">
                                        <div class="content">
                                            <h1 class="title"><a href="#">{{$building->name}}</a></h1>
                                            <p class="row address flex-nowrap">
                                                <i class="material-icons text-muted">location_on</i>
                                                <span style="color:blue">{{$building->location??''}}, {{$building->cityDetails->nationality->name??''}}, {{$building->cityDetails->name??''}}, Pin -{{$building->pincode??''}}</span>
                                            </p>
                                            <div class="row between-xs middle-xs">
                                                <h3 class="primary-color price">
                                                    <span>$ {{$building->cost_building??''}}</span>
                                                </h3>
                                                <div class="row start-xs middle-xs ratings" title="29">
                                                    <i class="material-icons mat-icon-sm">star</i>
                                                    <i class="material-icons mat-icon-sm">star</i>
                                                    <i class="material-icons mat-icon-sm">star</i>
                                                    <i class="material-icons mat-icon-sm">star</i>
                                                    <i class="material-icons mat-icon-sm">star_half</i>
                                                </div>
                                            </div>
                                            <div class="d-none d-md-flex d-lg-flex d-xl-flex">
                                                <div class="description mt-3">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat modi dignissimos blanditiis accusamus, magni provident omnis perferendis laudantium illo recusandae ab molestiae repudiandae cum obcaecati nulla adipisci fuga culpa repellat!</p>
                                                </div>
                                            </div>
                                            <div class="features mt-3">
                                                <p><span>Property size</span><span>{{$building->land_size_foot??''}} ft²</span></p>
                                                <p><span>Construction Date</span><span>{{date('d/M/Y',strtotime($building->construction_date??''))}}</span></p>
                                                <p><span>Building Code</span><span>{{$building->building_code??''}}</span></p>
                                                <p><span>Owner</span><span>{{$building->owner_name}}</span></p>
                                            </div>
                                        </div>
                                        <div class="grow"></div>
                                        <div class="actions row between-xs middle-xs">
                                            <p class="row date mb-0">
                                                <i class="material-icons text-muted">date_range</i>
                                                <span class="mx-2">{{$building->created_at?$building->created_at->format('d-M-Y'):''}}</span>
                                            </p>
                                            <a href="{{route('home.singleProperty')}}" class="mdc-button mdc-button--outlined">
                                                <span class="mdc-button__ripple"></span>
                                                <span class="mdc-button__label">Details</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="row center-xs middle-xs p-2 w-100">
                            <div class="mdc-card w-100">
                                <ul class="theme-pagination">
                                    <li class="pagination-previous disabled"><span>Previous</span></li>
                                    <li class="current"><span>1</span></li>
                                    <li><a><span>2</span></a></li>
                                    <li><a><span>3</span></a></li>
                                    <li><a><span>4</span></a></li>
                                    <li class="pagination-next"><a><span>Next</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section mt-3">
        <div class="px-3">
            <div class="theme-container">
                <h1 class="section-title mb-3">Our Clients</h1>
                <p class="text-center text-muted fw-500">Sed magna ipsum, ultricies sed sagittis nec, scelerisque eu libero. Donec at metus ac eros accumsan semper.</p>
                <div class="clients-carousel">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="client-item">
                                    <img src="{{asset('home2/assets/images/others/transparent-bg.png')}}" alt="slide image" data-src="{{asset('home2/assets/images/clients/aloha.png')}}" class="swiper-lazy">
                                    <div class="swiper-lazy-preloader"></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="client-item">
                                    <img src="{{asset('home2/assets/images/others/transparent-bg.png')}}" alt="slide image" data-src="{{asset('home2/assets/images/clients/dream.png')}}" class="swiper-lazy">
                                    <div class="swiper-lazy-preloader"></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="client-item">
                                    <img src="{{asset('home2/assets/images/others/transparent-bg.png')}}" alt="slide image" data-src="{{asset('home2/assets/images/clients/congrats.png')}}" class="swiper-lazy">
                                    <div class="swiper-lazy-preloader"></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="client-item">
                                    <img src="{{asset('home2/assets/images/others/transparent-bg.png')}}" alt="slide image" data-src="{{asset('home2/assets/images/clients/best.png')}}" class="swiper-lazy">
                                    <div class="swiper-lazy-preloader"></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="client-item">
                                    <img src="{{asset('home2/assets/images/others/transparent-bg.png')}}" alt="slide image" data-src="{{asset('home2/assets/images/clients/original.png')}}" class="swiper-lazy">
                                    <div class="swiper-lazy-preloader"></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="client-item">
                                    <img src="{{asset('home2/assets/images/others/transparent-bg.png')}}" alt="slide image" data-src="{{asset('home2/assets/images/clients/retro.png')}}" class="swiper-lazy">
                                    <div class="swiper-lazy-preloader"></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="client-item">
                                    <img src="{{asset('home2/assets/images/others/transparent-bg.png')}}" alt="slide image" data-src="{{asset('home2/assets/images/clients/king.png')}}" class="swiper-lazy">
                                    <div class="swiper-lazy-preloader"></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="client-item">
                                    <img src="{{asset('home2/assets/images/others/transparent-bg.png')}}" alt="slide image" data-src="{{asset('home2/assets/images/clients/love.png')}}" class="swiper-lazy">
                                    <div class="swiper-lazy-preloader"></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="client-item">
                                    <img src="{{asset('home2/assets/images/others/transparent-bg.png')}}" alt="slide image" data-src="{{asset('home2/assets/images/clients/the.png')}}" class="swiper-lazy">
                                    <div class="swiper-lazy-preloader"></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="client-item">
                                    <img src="{{asset('home2/assets/images/others/transparent-bg.png')}}" alt="slide image" data-src="{{asset('home2/assets/images/clients/easter.png')}}" class="swiper-lazy">
                                    <div class="swiper-lazy-preloader"></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="client-item">
                                    <img src="{{asset('home2/assets/images/others/transparent-bg.png')}}" alt="slide image" data-src="{{asset('home2/assets/images/clients/with.png')}}" class="swiper-lazy">
                                    <div class="swiper-lazy-preloader"></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="client-item">
                                    <img src="{{asset('home2/assets/images/others/transparent-bg.png')}}" alt="slide image" data-src="{{asset('home2/assets/images/clients/special.png')}}" class="swiper-lazy">
                                    <div class="swiper-lazy-preloader"></div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="client-item">
                                    <img src="{{asset('home2/assets/images/others/transparent-bg.png')}}" alt="slide image" data-src="{{asset('home2/assets/images/clients/bravo.png')}}" class="swiper-lazy">
                                    <div class="swiper-lazy-preloader"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="px-3">
        <div class="theme-container">
            <div class="get-in-touch bg-primary">
                <img src="{{asset('home2/assets/images/others/operator.png')}}" alt="operator" class="d-none d-sm-flex d-md-flex d-lg-flex d-xl-flex">
                <div class="row between-xs middle-xs content">
                    <div class="column p-3">
                        <h2>LOOKING TO SELL YOUR HOME?</h2>
                        <p class="mb-0">Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                    </div>
                    <div class="row start-xs middle-xs p-3">
                        <i class="material-icons mat-icon-xlg mx-2">call</i>
                        <div class="column">
                            <p class="mb-0">CALL US NOW</p>
                            <h2 class="ws-nowrap">{!! $websiteSetting->where('name','mobile')->pluck('value')[0]??'Mobile Not Set' !!}</h2>
                        </div>
                    </div>
                    <div class="p-3">
                        <a href="javascript:void(0);" class="mdc-button mdc-button--raised mx-3">
                            <span class="mdc-button__ripple"></span>
                            <span class="mdc-button__label">get in touch</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection