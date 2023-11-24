@foreach ($table as $tb)
<a href="/super_admin/permohonan/show/{{ $tb->id }}" class="item">
    <div class="detail">
        <img src="{{ \Illuminate\Support\Facades\Storage::url($tb->user->photo) }}" alt="img" class="image-block imaged w48">
        <div>
            <strong>{{ $tb->user->nama }}</strong>
            <p>{{ $tb->kategori }}</p>
        </div>
    </div>
    <div class="right">
        <ion-icon name="arrow-forward-outline"></ion-icon>
    </div>
</a>
@endforeach