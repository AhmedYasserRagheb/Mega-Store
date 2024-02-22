<section style="width:100%; height: auto">
    <div style="width:100%; height: 120px; border: 1px solid red; margin-bottom: 20px">
        <form action="{{url('/show_comment')}}" style="width:50%; height: auto">
            <input type="text" name="comment" placeholder="add comment...">
            <button class="btn btn-dark">comment</button>
        </form>
    </div>
    <div style="width:100%; height: auto; border: 1px solid blue; padding: 15px; text-align: left">
        <p style="width:50%; height: auto;border: 1px solid blue; padding: 8px">
            {{$comments}}
        </p>
    </div>
</section>