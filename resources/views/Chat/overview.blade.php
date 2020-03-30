@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="user-wrapper">
                <ul class="users">
                    <li class="users">
                        <span class="pending">1</span>

                        <div class="media">
                            <div class="media-left">
                                <img src="https://via.placeholder.com/150" alt="" class="media-object">
                            </div>
                            
                            <div class="media-body">
                                <p class="name">Johne Doe</p>
                                <p class ="email">john@gmail.com</p>
                            </div>
                        </div>
                    </li>

                    <li class="users">
                        <span class="pending">1</span>

                        <div class="media">
                            <div class="media-left">
                                <img src="https://via.placeholder.com/150" alt="" class="media-object">
                            </div>
                            
                            <div class="media-body">
                                <p class="name">Johne Doe</p>
                                <p class ="email">john@gmail.com</p>
                            </div>
                        </div>
                    </li>

                    <li class="users">
                        <span class="pending">1</span>

                        <div class="media">
                            <div class="media-left">
                                <img src="https://via.placeholder.com/150" alt="" class="media-object">
                            </div>
                            
                            <div class="media-body">
                                <p class="name">Johne Doe</p>
                                <p class ="email">john@gmail.com</p>
                            </div>
                        </div>
                    </li>

                    <li class="users">
                        <span class="pending">1</span>

                        <div class="media">
                            <div class="media-left">
                                <img src="https://via.placeholder.com/150" alt="" class="media-object">
                            </div>
                            
                            <div class="media-body">
                                <p class="name">Johne Doe</p>
                                <p class ="email">john@gmail.com</p>
                            </div>
                        </div>
                    </li>

                    <li class="users">
                        <span class="pending"1></span>

                        <div class="media">
                            <div class="media-left">
                                <img src="https://via.placeholder.com/150" alt="" class="media-object">
                            </div>
                            
                            <div class="media-body">
                                <p class="name">Johne Doe</p>
                                <p class ="email">john@gmail.com</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-md-8" id="messages">
            <div class="message-wrapper">
                <ul class="messages">
                    <li class="message clearfix">
                        <div class="sent">
                            <p>Lorem ipsum dolor.</p>
                            <p class="date">6 Apr, 2020</p>
                        </div>
                    </li>

                    <li class="message clearfix">
                        <div class="received">
                            <p>Lorem ipsum dolor.</p>
                            <p class="date">6 Apr, 2020</p>
                        </div>
                    </li>

                    <li class="message clearfix">
                        <div class="sent">
                            <p>Lorem ipsum dolor.</p>
                            <p class="date">6 Apr, 2020</p>
                        </div>
                    </li>

                    <li class="message clearfix">
                        <div class="received">
                            <p>Lorem ipsum dolor.</p>
                            <p class="date">6 Apr, 2020</p>
                        </div>
                    </li>

                    <li class="message clearfix">
                        <div class="sent">
                            <p>Lorem ipsum dolor.</p>
                            <p class="date">6 Apr, 2020</p>
                        </div>
                    </li>

                    <li class="message clearfix">
                        <div class="received">
                            <p>Lorem ipsum dolor.</p>
                            <p class="date">6 Apr, 2020</p>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="input-text">
                <input type="text"name="message" class="submit">
            </div>
            
        </div>

    </div>                    
</div>
@endsection
