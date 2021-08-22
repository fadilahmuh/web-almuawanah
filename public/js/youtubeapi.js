$channelId = $('#yt_res').attr('yt-id');
// console.log($test);
$apikey = "AIzaSyBswKibMjCpmTpH9Z9g7v88KJl7xxhvGa8";
// $channelId = "UC6Wp_bA0LWBpJg2-nCIG88Q";
// $pl_id;

$.get(
  "https://www.googleapis.com/youtube/v3/channels",
  {
    part: "snippet,statistics,contentDetails",
    key: $apikey,
    id: $channelId,
  },
  function (data) {
    $pl_id = data.items[0].contentDetails.relatedPlaylists.uploads;
    console.log("Get id PL");
    $.get(
      "https://www.googleapis.com/youtube/v3/playlistItems",
      {
        part: "snippet",
        maxResults: "50",
        key: $apikey,
        playlistId: $pl_id,
      },
      function (data) {
        $.each(data.items, function (i, item) {
          vidTittle = item.snippet.title;
          vidId = item.snippet.resourceId.videoId;
          vidURL = "https://www.youtube.com/watch?v=" + vidId;
          if ('standard' in item.snippet.thumbnails) {
            vidThumb = item.snippet.thumbnails.standard.url;
          } else {
            vidThumb = item.snippet.thumbnails.high.url;
          }

          output = '<div class="slide-item"><div class="yt-thumb"><a href="'+ vidURL +'"  data-lity><img src="' + vidThumb + '" alt="" /><div class="overlay d-flex align-items-center justify-content-center"><i class="fab fa-youtube"></i></div></a></div></div>';

          $("#yt_res").append(output);
        });

        $("#yt_res").slick({
          rows: 2,
          dots: true,
          prevArrow: '<i class="fas fa-chevron-left sa-left"></i>',
          nextArrow: '<i class="fas fa-chevron-right sa-right"></i>',
          infinite: false,
          speed: 300,
          slidesToShow: 3,
          slidesToScroll: 2,
          responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }    
          ]
        });
      }
    );
  }
);
