<div class="p2">
    <div class="form-group">
        <input type="text" name="name" id="name" value="{{ $transactions->id }}" class="form-control"
            placeholder="name product">
    </div>
    <div class="form-group mt-2">
        <button class="btn btn-warning" onClick="update({{ $transactions->id }})">Update</button>
    </div>
</div>