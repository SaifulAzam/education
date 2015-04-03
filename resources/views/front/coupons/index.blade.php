@extends('front.layouts.frontend')
@section('css')
    <link rel="stylesheet" href="/assets/css/pages/portfolio-v1.css">
@endsection
@section('content')
    <!--=== Breadcrumbs v3 ===-->
    <div class="breadcrumbs-v3 img-v1 margin-bottom-40">
        <div class="container text-center">
            <p>Portfolio</p>
            <h1>Portfolio 2 Columns Grid No Space</h1>
        </div><!--/end container-->
    </div>
    <!--=== End Breadcrumbs v3 ===-->

    <!--=== Content Part ===-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="view view-tenth">
                    <img class="img-responsive" src="/assets/img/main/1.jpg" alt="" />
                    <div class="mask">
                        <h2>Portfolio Item</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
                        <a href="portfolio_item.html" class="info">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="view view-tenth">
                    <img class="img-responsive" src="/assets/img/main/2.jpg" alt="" />
                    <div class="mask">
                        <h2>Portfolio Item</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
                        <a href="portfolio_item.html" class="info">Read More</a>
                    </div>
                </div>
            </div>
        </div><!--/row-->

        <div class="row margin-bottom-20">
            <div class="col-sm-6">
                <div class="view view-tenth">
                    <img class="img-responsive" src="/assets/img/main/3.jpg" alt="" />
                    <div class="mask">
                        <h2>Portfolio Item</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
                        <a href="portfolio_item.html" class="info">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="view view-tenth">
                    <img class="img-responsive" src="/assets/img/main/4.jpg" alt="" />
                    <div class="mask">
                        <h2>Portfolio Item</h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
                        <a href="portfolio_item.html" class="info">Read More</a>
                    </div>
                </div>
            </div>
        </div><!--/row-->
    </div><!--/container-->
    <!--=== End Content Part ===-->
@endsection
