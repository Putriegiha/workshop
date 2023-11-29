<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\PemesananDetail;
use App\Models\PemesananPembayaran;

class DetailPemesananController extends Controller
{
    /**
     * Show the details of a specific order.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemesanan $pemesanan)
    {
        // Make sure the order belongs to the authenticated user
        abort_if($pemesanan->user_id != auth()->id(), 403);

        return view('pages.shop.pemesanan.detail-pemesanan', compact('pemesanan'));
    }

    /**
     * Show the payment details of a specific order.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function showPaymentDetails(Pemesanan $pemesanan)
    {
        // Fetch payment details for the order
        $paymentDetails = $pemesanan->pembayaran;

        return view('pages.shop.pemesanan.detail-pembayaran', compact('pemesanan', 'paymentDetails'));
    }

    /**
     * Show the details of a specific order item.
     *
     * @param  \App\Models\PemesananDetail  $pemesananDetail
     * @return \Illuminate\Http\Response
     */
    public function showOrderItem(PemesananDetail $pemesananDetail)
    {
        // Make sure the order item belongs to the authenticated user
        abort_if($pemesananDetail->pemesanan->user_id != auth()->id(), 403);

        return view('pages.shop.pemesanan.detail-order-item', compact('pemesananDetail'));
    }
}
