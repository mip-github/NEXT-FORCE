<script>
    $(document).ready(function () {
        $('#btnUpload').click(function (e) {
            e.preventDefault();
            var getFile = document.getElementById('file').files[0];
            var getId = $("#getFlId").val();
            var formdata = new FormData();
            formdata.append("file", getFile);
            formdata.append("getFlId", getId);
            $.ajax({
                url: '@Url.Action("FlatImageOne", "Home")',
                type: 'POST',
                data: formdata,
                processData: false,
                contentType: false,
                success: function (data) {
                    alert("Upload successful!");
                    $('#imgOne').empty();
                    $('#imgOne').html('<img src="/Images/Flats/' + getId + '-0.png?"' + new Date().getTime() +' alt="your image" class="img-responsive" />');
                },
                error: function () {
                    alert("Error! Please Try Again!");
                }
            });
        });
    });
</script>

<div>
    @using (Html.BeginForm("FlatImageOne", "Home", FormMethod.Post, new { enctype = "multipart/form-data" }))
    {
        @Html.ValidationSummary(true, "Error! Please provide valid information!")

        <input type="file" name="file" id="file" style="width: 100%;" /><br />
        <input type="hidden" name="getFlId" id="getFlId" value="@ViewBag.ImgName" />
        <input id="btnUpload" type="submit" class="btn btn-info" value="Upload" />
    }
</div><br />
<div id="imgOne">
    <img src="~/Images/Flats/@(ViewBag.ImgName)-0.png" alt="your image" class="img-responsive" />
</div>
