<template>
    <div class="panel-default">
        <div class="panel-body">
            <form class="" action="" method="post">

                <label for="design_id"></label>
                <select class="form-control" name="design_id">
                    <option value=""></option>
                    <option value=""></option>
                </select>

                <label for="gender"></label>
                <select class="form-control" name="gender" style="margin-top:5px">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>

                <label for="size">Size:</label>
                <select class="form-control" name="size" style="margin-top:5px">
                    <option value=""></option>
                    <option value="small">Small</option>
                    <option value="medium">Medium</option>
                    <option value="large">Large</option>
                    <option value="extra-large">Extra-Large</option>
                </select>

                <label for="measurement">Measurement(sh,leg,arm-len,weist,l,):</label>
                <input type="text" name="measurment" class="form-control">

                <label for="request_img">Upload Image</label>
                <input type="file" name="request_img[]" multiple="true" class="form-control">

                <input type="submit" name="Submit" class="btn btn-primary btn-sm" style="margin-top:10px">
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
