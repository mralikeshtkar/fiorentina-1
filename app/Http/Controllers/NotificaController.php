<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifica;
use Illuminate\Support\Facades\Validator;

class NotificaController extends Controller
{
    public function store(Request $request)
    {
        // Validate the email and match_id
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'match_id' => 'required|text'
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }

        // Store the data in the database
        Notifica::create([
            'email' => $request->email,
            'match_id' => $request->match_id
        ]);

        return response()->json(['success' => true]);
    }
}
