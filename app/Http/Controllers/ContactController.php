<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\User;
use App\Notifications\NewContactFormNotification;
use Filament\Notifications\Notification;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        try {
            $messages = [
                'name.required' => 'Le nom est obligatoire.',
                'name.string' => 'Le nom doit être une chaîne de caractères.',
                'name.max' => 'Le nom ne doit pas dépasser 255 caractères.',
                'email.required' => 'L\'email est obligatoire.',
                'email.email' => 'L\'email doit être une adresse email valide.',
                'email.max' => 'L\'email ne doit pas dépasser 255 caractères.',
                'message.required' => 'Le message est obligatoire.',
                'message.string' => 'Le message doit être une chaîne de caractères.',
            ];

            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'message' => 'required|string'
            ], $messages);
             $notification = new NewContactFormNotification(
             $validated['name'],
            $validated['email'],
          $validated['message']
                );
           Notification::make()
               ->title("Vous avez réussi un message pour $notification->name
                son email doit etre verifié avant d'etre contacter $notification->email  ")
               ->body("voici un nouveau message  : $notification->message")
               ->success()
               ->sendToDatabase( User::all())
               ->send();


            $contact = contact::create($validated);
            

            if (!$contact) {
                throw new \Exception('Échec de la création du message');
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Message envoyé avec succès!'
            ], 200);

        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'errors' => $e->errors(),
                'message' => 'Veuillez corriger les erreurs de validation.'
            ], 422);

        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'envoi du message: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'Une erreur technique est survenue. Veuillez réessayer plus tard.'
            ], 500);
        }
    }
}
