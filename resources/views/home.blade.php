@extends('layouts.front')

@section('content')
    <section id="research-section">
        <div class="container">
            <div class="research-form">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content">
                            <h1>Website Research</h1>
                            <p>
                                Dive into the largest keyword research database in the
                                market and check backlinks, organic keywords of any website
                                or URL
                            </p>
                            <div class="input-group">
                                <input type="url" class="form-control" placeholder="Search Domain or Url" id="url" />
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-lg px-4 me-sm-3" type="submit" id="url-search">
                                        <i class="fa fa-search"></i>&nbsp;Search
                                    </button>
                                </span>
                            </div>
                            <div class="research-form-links">
                                <span>Example :</span><a href="">fast.com</a>
                                <a href="">searchenginejournal.com/category/seo</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <h4 class="col-md-4 text-end">Title: </h4>
                    <p id="url-title" class="col-md-8"></p>
                </div>

                <div class="row">
                    <h4 class="col-md-4 text-end">Word Count: </h4>
                    <p id="word-count" class="col-md-8"></p>
                </div>



            </div>
        </div>
    </section>
@endsection
