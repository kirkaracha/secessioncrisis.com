@extends('layouts.default')

@section('title', $title ?? 'Untitled')

@section('contents')
    {!! $page->contents !!}
@endsection
