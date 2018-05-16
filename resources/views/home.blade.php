@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="/visualization" enctype="multipart/form-data" method="POST">
                            <p>Please, select an example file</p>
                            <div class="examples">
                                <div class="example">
                                    <input type="radio" name="example-file" id="example1" value="example1">
                                    <label for="example1">Example 1: fits for all visualizations (except Chord).</label>
                                </div>
                                <div class="example">
                                    <input type="radio" name="example-file" id="example2" value="example2">
                                    <label for="example2">Example 2: fits for Chord.</label>
                                </div>
                                <div class="example">
                                    <input type="radio" name="example-file" id="example3" value="example3">
                                    <label for="example3">Example 3: fits for Parallel Coordinates.</label>
                                </div>
                            </div>

                            <p>or upload your own in JSON or CSV formats.</p>
                            <div>
                                <label for="bda-file">
                                    <input type="file" name="bda-file" id="bda-file">
                                </label>
                            </div>

                            <div class="viz-selection">
                                <div class="viz-radio">
                                    <input type="radio" name="visualization" id="treemap" value="treemap">
                                    <label for="treemap">
                                        <span class="image-box">
                                            <img src="{{ asset('img/treemap.png') }}">
                                        </span>
                                        <span class="image-text">Treemap</span>
                                    </label>
                                </div>
                                <div class="viz-radio">
                                    <input type="radio" name="visualization" id="circlePacking" value="circlePacking">
                                    <label for="circlePacking">
                                        <span class="image-box">
                                            <img src="{{ asset('img/circle.png') }}">
                                        </span>
                                        <span class="image-text">Circle Packing</span>
                                    </label>
                                </div>
                                <div class="viz-radio">
                                    <input type="radio" name="visualization" id="sunburst" value="sunburst">
                                    <label for="sunburst">
                                        <span class="image-box">
                                            <img src="{{ asset('img/sunburst.png') }}">
                                        </span>
                                        <span class="image-text">Sunburst</span>
                                    </label>
                                </div>
                            </div>
                            <div class="viz-selection">
                                <div class="viz-radio">
                                    <input type="radio" name="visualization" id="chord" value="chord">
                                    <label for="chord">
                                        <span class="image-box">
                                            <img src="{{ asset('img/chord.png') }}">
                                        </span>
                                        <span class="image-text">Chord</span>
                                    </label>
                                </div>
                                <div class="viz-radio">
                                    <input type="radio" name="visualization" id="parallel" value="parallel">
                                    <label for="parallel">
                                        <span class="image-box">
                                            <img src="{{ asset('img/parallel.png') }}">
                                        </span>
                                        <span class="image-text">Parallel Coordinates</span>
                                    </label>
                                </div>
                                <div class="viz-radio">
                                    <input type="radio" name="visualization" id="streamgraph" value="streamgraph">
                                    <label for="streamgraph">Streamgraph</label>
                                </div>
                            </div>
                            <button class="btn btn-primary">Visualize!</button>
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
