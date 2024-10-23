<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table): void {
            $table->integer('count')->default(0)->after('is_published');
        });
    }








    //     <button id="click-button" data-id="{{ $item->id }}">Click Me!</button>
    // <p>Click Count: <span id="click-count">{{ $item->click_count }}</span></p>

    // <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    // <script>
    //     $('#click-button').on('click', function() {
    //         let itemId = $(this).data('id');

    //         $.ajax({
    //             url: '/item/' + itemId + '/click',
    //             type: 'POST',
    //             data: {
    //                 _token: '{{ csrf_token() }}',
    //             },
    //             success: function(response) {
    //                 if (response.success) {
    //                     $('#click-count').text(response.click_count);
    //                 }
    //             },
    //             error: function() {
    //                 alert('Error incrementing the click count.');
    //             }
    //         });
    //     });
    // </script>


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articales', function (Blueprint $table) {
            $table->dropColumn('count');
        });
    }
};
