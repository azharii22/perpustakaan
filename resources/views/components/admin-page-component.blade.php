<div>
    <div class="pagetitle">
        <h1>{{ $currentPage }}</h1>
        
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                {{ $breadcrumb }}
            </ol>
        </nav>
    </div>
    
    <div class="row my-4">
        <div class="col">
            {{ $actionButton }}
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div>
                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="p-0 m-0" style="list-style: none;">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(\Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <ul class="p-0 m-0" style="list-style: none;">
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
                @endif
                @if(\Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="p-0 m-0" style="list-style: none;">
                        <li>{!! \Session::get('error') !!}</li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            {{ $content }}
        </div>
    </div>
</div>