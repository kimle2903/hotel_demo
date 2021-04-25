<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <form action="{{route('process-search')}}" method="post">
            @csrf
             <div class="row d-flex justify-content-center align-items-center">
            <div class="col-6">
                <div class="form-group group-date">
                    <label for="">Currency you want</label>
                    <select name="currency" id="currency" class="form-control">
                        <option value="NOK">Norway - Crown</option>
                        <option value="USD">United States - Dollar</option>
                        <option value="GBP">United Kingdom - Pound</option>
                        <option value="AUD">Australia - Australian dollar</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group group-date">
                    <label for="">EUROS</label>
                    <input type="text" class="form-control" id="price_euros" name="price_euros" >
                </div>
            </div>
            <div class="col-3">
                 <div class="form-group group-date">
                    <label for="">USD</label>
                    <input type="text" class="form-control" id="price_currency" name="price_currency" >
                </div>
            </div>
            </div>
            <div class="form-group">
                <label for="">When are you travelling?</label>
                <select name="time_travelling" id="" class="form-control">
                    <option value="1">In more than 2 working days</option>
                    <option value="2">Less than 2 working days</option>
                    <option value="3">In more than 4 working days</option>
                    <option value="4">In less than 4 working days</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">3. Where to get your currency?</label>
                <select name="location" id="location" class="form-control">
                    <option value="0">Home delivery</option>
                    <option value="1">Benidorm (Alicante) store</option>
                    <option value="2">Cordoba store</option>
                    <option value="3">Madrid store</option>
                </select>
            </div>
            <button type="submit">Submit</button>
        </form>
       
    </div>
</body>
</html>