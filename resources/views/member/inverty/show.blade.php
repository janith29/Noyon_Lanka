@extends('member.layouts.member')
@section('title', "Inverty Management")

@section('content')
    <div class="row">
        <table class="table table-striped table-hover">
            <tbody>
           

            <tr>
                <th>Article No</th>
                <td>{{ $inverty->articleNo }}</td>
            </tr>

            <tr>
                    <th>Color</th>
                    <td>{{ $inverty->color}}</td>
                </tr>
            <tr>
                    <th>Collection</th>
                    <td>{{ $inverty->collection }}</td>
                </tr>
            <tr>
                <th>Location</th>
                <td>
                        {{ $inverty->location }}
                    </a>
                </td>
            </tr>
            <tr>
                <th>Inventory Quantity</th>
                <td>
                    {{ ($inverty->qty)}} 
                </td>
            </tr>
            </tbody>
        </table>
        <a href="{{ route('member.inverty') }}" class="btn btn-danger">Inventory home</a>
       
    </div>
    <script>
            // Get the modal
            var modal = document.getElementById('myModal');
            // var img=document.getElementById("myImg");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
           
              function displayIMG(clicked_id)
            {
                modal.style.display = "block";
                modalImg.src = document.getElementById(clicked_id).src;
                captionText.innerHTML =document.getElementById(clicked_id).alt;
            }  
            
            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];
            
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() { 
                modal.style.display = "none";
            }
            </script>
            
@endsection