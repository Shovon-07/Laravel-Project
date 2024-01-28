<div class="popup hidePopUp">
    <div>
        <h3 style="margin-bottom:40px;color:var(--dark-2)">Change profile pic</h3>
    </div>
    <form action="{{route('update.profile.pic')}}" method="POST" enctype="multipart/form-data">
        <div>
            <label for="files" class="selectImg">Select Image</label>
            <input type="file" id="files" class="img" name="img" required style="visibility:hidden;">

            {{-- <input type="file" required id="img" name="img" placeholder="Choose profile pic"> --}}
        </div>
        <button type="submit" class="submitBtn" id="closePopUp">CONFIRM</button>
    </form>
    <a class="cancel" id="closePopUp">Cancel</a>
</div>

<script>
    const img = document.querySelector(".img").value;
    document.querySelector(".submitBtn").addEventListener('click', () => {
        if(img.length === 0) {
            showTost("You don't select any image");
        } else {
            showTost(`Selected ${img}`);
        }
    });
</script>