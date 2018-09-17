<!-- BEGIN RIGHT SIDEBAR -->
<div class="col-md-3 col-sm-3 blog-sidebar">
    <!-- CATEGORIES START -->
    <h2 class="no-top-space">Categories</h2>
    <ul class="nav sidebar-categories margin-bottom-40">
        @foreach($topics as $row)
            <li>
                @if(isset($topicSidebar) && $topicSidebar == $row->id)
                    <a href="{{ route('posts',  ['slug' => $row->slug]) }}" class="title-topic-choose">
                        {{ $row->name }} ({{ count($row->posts) }})
                    </a>
                @else
                    <a href="{{ route('posts',  ['slug' => $row->slug]) }}">{{ $row->name }} ({{ count($row->posts) }})</a>
                @endif
            </li>
        @endforeach
    </ul>
    <!-- CATEGORIES END -->

    <!-- BEGIN RECENT NEWS -->
    <h2>Recent News</h2>
    <div class="recent-news margin-bottom-10">
        @foreach($recentPost as $row)
            <div class="row margin-bottom-10">
                <div class="col-md-3">
                    <img class="img-responsive" alt=""
                         src="{{ asset('source/frontend/theme/assets/frontend/pages/img/people/img2-large.jpg') }}">
                </div>
                <div class="col-md-9 recent-news-inner">
                    <h3 class="title-recent-post-sidebar"><a href="{{ route('posts.show', $row->id) }}">{{ $row->title }}</a></h3>
                    {{--<p class="content-recent-post-sidebar">{{ $row->content }} </p>--}}
                </div>
            </div>
        @endforeach
    </div>
    <!-- END RECENT NEWS -->

    <!-- BEGIN BLOG PHOTOS STREAM -->
    <div class="blog-photo-stream margin-bottom-20">
        <h2>Top Views</h2>
        <ul class="list-unstyled">
            <li><a href="javascript:;"><img alt=""
                                            src="{{ asset('source/frontend/theme/assets/frontend/pages/img/people/img5-small.jpg') }}"></a>
            </li>
            <li><a href="javascript:;"><img alt=""
                                            src="{{ asset('source/frontend/theme/assets/frontend/pages/img/works/img1.jpg') }}"></a>
            </li>
            <li><a href="javascript:;"><img alt=""
                                            src="{{ asset('source/frontend/theme/assets/frontend/pages/img/people/img4-large.jpg') }}"></a>
            </li>
            <li><a href="javascript:;"><img alt=""
                                            src="{{ asset('source/frontend/theme/assets/frontend/pages/img/works/img6.jpg') }}"></a>
            </li>
            <li><a href="javascript:;"><img alt=""
                                            src="{{ asset('source/frontend/theme/assets/frontend/pages/img/pics/img1-large.jpg') }}"></a>
            </li>
            <li><a href="javascript:;"><img alt=""
                                            src="{{ asset('source/frontend/theme/assets/frontend/pages/img/pics/img2-large.jpg') }}"></a>
            </li>
            <li><a href="javascript:;"><img alt=""
                                            src="{{ asset('source/frontend/theme/assets/frontend/pages/img/works/img3.jpg') }}"></a>
            </li>
            <li><a href="javascript:;"><img alt=""
                                            src="{{ asset('source/frontend/theme/assets/frontend/pages/img/people/img2-large.jpg') }}"></a>
            </li>
        </ul>
    </div>
    <!-- END BLOG PHOTOS STREAM -->

    <!-- BEGIN BLOG TAGS -->
    <div class="blog-tags margin-bottom-20">
        <h2>Tags</h2>
        <ul>
            @foreach($tags as $tag)
                <li><a href="{{ route('tags.show', $tag->id) }}"><i class="fa fa-tags"></i>{{ $tag->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <!-- END BLOG TAGS -->
</div>
<!-- END RIGHT SIDEBAR -->