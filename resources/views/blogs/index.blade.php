@props(['blogs','categories','currentcategory'])

<x-layout>
    <x-slot name="title">Create coder</x-slot>
    <!-- navbar -->
    <!-- hero section -->
    @if (session('success'))
    <div class=" alert alert-success text-center">
{{session('success')}}
    </div>

    @endif
    <x-hero />
    <!-- blogs section -->
    <x-blogs-section :blogs="$blogs" />
    {{-- :categories="$categories" :currentcategory="$currentcategory ?? null" --}}
    <!-- subscribe new blogs -->
  
    <!-- footer -->

</x-layout>
