<?php

namespace App\Http\Controllers;

use App\Models\config;
use App\Models\partenaire;
use App\Models\produitmodel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Artesaos\SEOTools\Facades\SEOTools;

class produitcontroller extends Controller
{
    public function index()
    {
        $produits = produitmodel::whereHas('stocks', function ($query) {
        $query->where('quantity', '>', 10);
    })
    ->with('stocks') // charge la relation
    ->get();


        $contacte= config::latest()->first();
        $partenaires = partenaire::all();
        
        SEOTools::setTitle($contacte?->title);
        SEOTools::setDescription($contacte?->description);
        SEOTools::metatags()->setKeywords($contacte?->key ?? []);
        SEOTools::metatags()->addMeta('Author', $contacte?->hauteur, 'name');
        SEOTools::metatags()->addMeta('Email', $contacte?->email, 'name');
        SEOTools::opengraph()->addProperty('Facebook', $contacte?->facebook);
        SEOTools::addImages('storage/img/img.png');
    
        return view('home', [
            'produits' => $produits,
            'partenaires' => $partenaires,
            'contacte'=>$contacte
        ]);
    }



    public function produit(){

        $contacte= config::latest()->first();
        $produits = produitmodel::whereHas('stocks', function ($query) {
        $query->where('quantity', '>', 10);
        }) ->with('stocks') ->get();


        $produit = $produits->first();

        if ($produit) {
             SEOTools::setTitle('Nos produits');
            SEOTools::setDescription('Découvrez notre gamme complète de solutions de sécurité incendie');
             SEOTools::metatags()->addMeta('Author','Fidele bauma','name');
        }

       

        return view('produit', [
            'produits' => $produits,
             'contacte'=>$contacte
        ]);

    }

    public function angagement()
    {
        $contacte= config::latest()->first();
        return view('partner-engagement',compact('contacte'));
    }


    public function partenaire()
    {
        $contacte= config::latest()->first();
        $partenaire = new partenaire();
        SEOTools::setTitle('Devenir partenaire');
        SEOTools::setDescription("Rejoignez notre réseau de partenaires et bénéficiez d'avantages exclusifs");
        return view('devenir-partenaire',compact('contacte'));
    }

    public function faq()
    {
        
        $contacte= config::latest()->first();
        SEOTools::setTitle('Questions fréquentes');
        SEOTools::setDescription("Trouvez les réponses aux questions les plus courantes sur nos produits");
        return view('faq',compact('contacte'));
    }



    public function plus($id,$slug)
    {
      $produit = ProduitModel::where([  ['id', '=', $id], ['slug', '=', $slug]])->firstOrFail();

        $contacte= config::latest()->first();
             SEOTools::setTitle($produit?->name);
             SEOTools::setDescription($produit?->meta_description);
             SEOTools::metatags()->addMeta('Author',$produit?->user_name,'name');
             SEOTools::addImages('storage/'.$produit?->photo);
        return view('plus',compact('produit','contacte'));
    }

    /**
     * Store a new partner in the database
     */
    public function storePartenaire(Request $request)
    {
        try {
            // Valider les données
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'email' => 'required|email|unique:partenaires,email',
                'telephone' => 'nullable|string|max:20',
                'adresse' => 'nullable|string',
                'site_web' => 'nullable|url',
                'name' => 'required|string|max:255',
                'fonction' => 'required|string|max:255',
                'type' => 'required',
                'signature' => 'nullable|string',
                'note' => 'nullable|string',
                'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Traiter le logo s'il existe
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('partenaires/logos', 'public');
                $validated['logo'] = $logoPath;
            }

            // Créer le partenaire
            $newPartenaire = partenaire::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Partenaire enregistré avec succès !',
                'partner_id' => $newPartenaire->id,
                'data' => $newPartenaire
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de l\'enregistrement',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
