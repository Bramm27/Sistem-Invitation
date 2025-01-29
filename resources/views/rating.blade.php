<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('guest') }}/style.css">
    <title>Form Reviews</title>
</head>
<body>
    <div class="wrapper">
        <h3>Kritik & Saran</h3>
        <!-- Mengirim data dengan metode POST -->
        <form action="/ratingPost" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="rating">
                <input type="number" name="rating" hidden>
                <i class="bx bx-star star" name="1" value="1" style="--i: 0;"></i>
                <i class="bx bx-star star" name="2" value="2" style="--i: 1;"></i>
                <i class="bx bx-star star" name="3" value="3" style="--i: 2;"></i>
                <i class="bx bx-star star" name="4" value="4" style="--i: 3;"></i>
                <i class="bx bx-star star" name="5" value="5" style="--i: 4;"></i>
            </div>
            <textarea name="review" cols="30" rows="5" placeholder="Pendapat anda..." required></textarea>
            <div class="btn-group">
                <button type="submit" class="btn submit">Submit</button>
                <button type="button" class="btn cancel" onclick="resetForm()">Cancel</button>
            </div>
        </form>
    </div>

    <script src="{{ asset('guest') }}/script.js"></script>
</body>
</html>
