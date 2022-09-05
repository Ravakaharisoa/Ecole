<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Professeur;
use App\Models\Payement;
use App\Models\Matieres;
use App\Models\Etudiant;
use App\Models\Examen;
use App\Models\Saisons;
use App\Models\Classes;
use App\Models\Droits;
use App\Models\User;
use App\Models\Note;

class AdminController extends Controller
{
	public function index()
	{
		return view('auth.register');
	}

    public function Accueil()
    {  
    	if (Auth::id()) {
        $data = [
          'etudiants'=>Etudiant::select("etudiants.id","etudiants.nom","etudiants.prenom","etudiants.matricule","etudiants.date_naissance","etudiants.sexe","classes.classes")->join('classes',"etudiants.classe","=","classes.id")->orderBy('etudiants.id','desc')->get(),
          'inscrit'=>Etudiant::count(),
          'fille'=>Etudiant::where(['sexe'=>"Fille"])->count(),
          'garcon'=>Etudiant::where(['sexe'=>"Garçon"])->count(),
          'classe'=>Classes::count()
        ];
    		return view('admin.accueil')->with($data);
    	}
    }

   	public function matiere()
   	{
   		$data = Matieres::orderBy('matieres','asc')->get();

   		return view('admin.matieres.index',compact('data'));
   	}

   	public function AjoutMatiere(Request $request)
   	{
   		$data = new Matieres();

   		$newMatiere = $request->matiere;

      if ($newMatiere) {
        $data->matieres = $newMatiere;

        if($data->save()){
          return redirect()->back()->with('success','Matière bien enregistrée!!');
        }
        else{
          return redirect()->back()->with('erreur','Cette matière ne peut pas être enregistrée!!');
        } 
      }
   	}

    public function supprimeMatiere($id)
    {
      $data = Matieres::find($id);

      if($data->delete()){
        return redirect()->back()->with('delete','Cette matière a bien supprimée');
      }
    }

    public function editMatiere($id)
    {
      $data = Matieres::find($id);
      return view('admin.matieres.edit',compact('data'));
    }

    public function modifieMatiere(Request $request,$id)
    {
      $data = Matieres::find($id);

      $matieres = $request->matiere;

      if ($matieres) {
        $data->matieres =$matieres;
        if ($data->save()) {
          return redirect()->back()->with('modifie','Matière bien modifiée!!');
        }
        else{
          return redirect()->back()->with('message','Vérifiez bien votre saisie!');
        }
      }
    }

    public function classe()
    {
      $data = Classes::all();
      return view('admin.classes.index',compact('data'));
    }

    public function AjoutClasse(Request $request)
    {
        $data = new Classes();

        $newClasse = $request->classe;

        if ($newClasse) {
        $data->classes = $newClasse;

        if($data->save()){
          return redirect()->back()->with('success','Classe bien enregistrée!!');
        }
        else{
          return redirect()->back()->with('erreur','Cette classe ne peut pas être enregistrée!!');
        } 
      }
    }

    public function supprClasses($id)
    {
      $data = Classes::find($id);

      if($data->delete()){
        return redirect()->back()->with('delete','Cette classe a bien supprimée');
      }
    }

    public function editClasse($id)
    {
      $data = Classes::find($id);

      return view('admin.classes.edit',compact('data'));
    }

    public function modifieClasse(Request $request,$id)
    {
      $data = Classes::find($id);

      $classes = $request->classe;

      if ($classes) {
        $data->classes =$classes;
        if ($data->save()) {
          return redirect()->back()->with('modifie','Classes bien modifiée!!');
        }
        else{
          return redirect()->back()->with('message','Vérifiez bien votre saisie!');
        }
      }
    }

    public function droit()
    {
      $data = Droits::all();
      return view('admin.droits.index',compact('data'));
    }

    public function AjoutDroit(Request $request)
    {
      $data = new Droits();

      $data->types = $request->type;
      $data->montant = $request->montant;

      if ($data->save()) {
        return redirect()->back()->with('success','Droit bien enregistré!!');
      }
      else{
        return redirect()->back()->with('erreur','Ce droit ne peut pas être enregistré!!');
      }
    }

    public function supprimeDroit($id)
    {
      $data = Droits::find($id);

      if ($data->delete()) {
        return redirect()->back()->with('delete','Ce droit a bien supprimée');  
      }   
    }

    public function editDroit($id)
    {
      $data = Droits::find($id);

      return view('admin.droits.edit',compact('data'));
    }

    public function modifieDroit(Request $request,$id)
    {
      $data = Droits::find($id);

        $data->types =$request->type;
        $data->montant =$request->montant;

        if ($data->save()) {
          return redirect()->back()->with('modifie','Droit bien modifié!!');
        }
        else{
          return redirect()->back()->with('message','Vérifiez bien votre saisie!');
        }
    }

    public function payement()
    {
      $i =1;
      $data=[
        'etudiants'=>Etudiant::all(),
        'droits'=>Droits::all(),
        'indice'=>$i,
        'payement'=>Payement::select("payements.date_pay","etudiants.nom","etudiants.prenom","classes.classes","droits.types","droits.montant")->join('etudiants',"etudiants.id","=","payements.etudiant")->join('classes',"classes.id","=","etudiants.classe")->join('droits',"droits.id","=","payements.droit")->get()
      ];
      return view('admin.droits.payement')->with($data);
    }

    public function nouveauPay(Request $request)
    {
       $data = new Payement();

       $data->etudiant = $request->etudiant;
       $data->droit = $request->typeDroit;
       $data->date_pay = $request->datePay;

       if ($data->save()){
         return redirect()->back()->with('success','Payement bien enregistré!!');
        }
        else{
          return redirect()->back()->with('erreur','Ce payement ne peut pas être enregistrée!!');  
        }
    }

    public function examen()
    {
      $data = [
          'saison'=> Saisons::all(),
          'examen'=> Examen::select("examens.id","examens.type_examen","saisons.saisons")->join("saisons","examens.Id_Saison","=","saisons.id")->get(),
      ];
      return view('admin.examen.index')->with($data);
    }

    public function AjoutExamen(Request $request)
    {
      $data = new Examen();

      $data->Id_Saison = $request->Saison;
      $data->type_examen = $request->type;

      if ($data->save()) {
        return redirect()->back()->with('success','Examen bien enregistré!!');
      }
      else{
        return redirect()->back()->with('erreur','Cet examen ne peut pas être enregistrée!!');
      }
    }

    public function supprimerExam($id)
    {
      $data = Examen::find($id);
      if ($data->delete()) {
        return redirect()->back()->with('delete','Cet examen a bien supprimé!!'); 
      }
    }

    public function editExamen($id)
    {
      $data = [
        'examen'=>Examen::find($id),
        'saison'=> Saisons::all()
      ];

      return view('admin.examen.editExamen')->with($data);
    }

    public function modifieExamen(Request $request,$id)
    {
      $data = Examen::find($id);

        $data->Id_Saison =$request->Saison;
        $data->type_examen =$request->type;

        if ($data->save()) {
          return redirect()->back()->with('modifie','Examen bien modifié!!');
        }
        else{
          return redirect()->back()->with('message','Vérifiez bien votre saisie!');
        }
    }

    public function saison()
    {
      $data = Saisons::all();
      $i =1;
      return view('admin.examen.saison',compact('data','i'));
    }

    public function ajoutSaison(Request $request)
    {
      $data = new Saisons();

      $newSaison = $request->saison;

      if ($newSaison) {
        $data->saisons = $newSaison;

        if($data->save()){
          return redirect()->back()->with('success','Saison bien enregistrée!!');
        }
        else{
          return redirect()->back()->with('erreur','Cette saison ne peut pas être enregistrée!!');
        } 
      }
    }

  public function supprimeSaison($id)
  {
    $data = Saisons::find($id);

    if ($data->delete()) {
      return redirect()->back()->with('delete','Cette saison a bien supprimée');
    }
  }

  public function editSaison($id)
  {
    $data = Saisons::find($id);
    return view('admin.examen.editSaison',compact('data'));
  }

  public function modifieSaison(Request $request,$id)
  {
    $data = Saisons::find($id);

      $saison = $request->saison;

      if ($saison) {
        $data->saisons =$saison;
        if ($data->save()) {
          return redirect()->back()->with('modifie','Saison bien modifiée!!');
        }
        else{
          return redirect()->back()->with('message','Vérifiez bien votre saisie!');
        }
      }
  }

  public function professeur()
  {
    $data = [
        'matieres'=> Matieres::all(),
    ];
    return view('admin.professeur.index')->with($data);
  }

  public function listeProfesseur()
  {
    $data =Professeur::select("professeurs.id","professeurs.nom","professeurs.prenom","professeurs.matricule","professeurs.contact1","professeurs.photo","matieres.matieres")->join("matieres","professeurs.Id_matiere","=","matieres.id")->get();
    $i = 1;
    return view('admin.professeur.liste',compact('data','i'));
  }

  public function ajoutProfs(Request $request)
  {
    $data = new Professeur();

    $photo = $request->photo;

    if ($photo) {
      $imageName = time().'.'.$photo->getClientOriginalExtension();
      $request->photo->move('profsPhotos',$imageName);

      $data->photo = $imageName;
      $data->nom = $request->nom;
      $data->prenom = $request->prenom;
      $data->matricule = $request->matricule;
      $data->nationalite = $request->nationalite;
      $data->adresse = $request->adresse;
      $data->sexe = $request->sexe;
      $data->date_naissance = $request->dateNais;
      $data->cin = $request->cin;
      $data->contact1 = $request->contact1;
      $data->contact2 = $request->contact2;
      $data->Id_matiere = $request->matiere;

      if ($data->save()) {
         return redirect()->back()->with('success','Professeur bien enregistrée!!');
      }
      else{
        return redirect()->back()->with('erreur','Ce Professeur ne peut pas être enregistrée!!');
      }
    }
  }

  public function supprimerProfesseur($id)
  {
    $data = Professeur::find($id);

    if ($data->delete()) {
        return redirect()->back()->with('delete','Ce Professeur a bien supprimé!!'); 
      }  
  }

  public function editProfesseur($id)
  {
    $data = [
      'professeur'=>Professeur::find($id),
      'matieres'=>Matieres::all()
    ];

    return view('admin.professeur.edit')->with($data);
  }

  public function modifieProfes(Request $request,$id)
  {
    $data = Professeur::find($id);

    $photo = $request->photo;

    if ($photo) {
      $imageName = time().'.'.$photo->getClientOriginalExtension();
      $request->photo->move('profsPhotos',$imageName);

      $data->photo = $imageName;
      $data->nom = $request->nom;
      $data->prenom = $request->prenom;
      $data->matricule = $request->matricule;
      $data->nationalite = $request->nationalite;
      $data->adresse = $request->adresse;
      $data->sexe = $request->sexe;
      $data->date_naissance = $request->dateNais;
      $data->cin = $request->cin;
      $data->contact1 = $request->contact1;
      $data->contact2 = $request->contact2;
      $data->Id_matiere = $request->matiere;

      if ($data->save()) {
         return redirect()->back()->with('modifie','Information bien modifiée!!');
      }
      else{
        return redirect()->back()->with('message','Vérifiez bien votre saisie!');
      }
    }
  }

  public function detailProfesseur($id)
  {
    $data = [
      'professeur'=>Professeur::find($id),
      'matieres'=>Matieres::all()
    ];
    return view('admin.professeur.detail')->with($data);
  }

  public function inscription()
  {
    $data = ['classes'=>Classes::all()];
    return view('admin.etudiant.index')->with($data);
  }

  public function inscrire(Request $request)
  {
    $data = new Etudiant();
    $photo = $request->photo;

    if ($photo) {
      $imageName = time().'.'.$photo->getClientOriginalExtension();
      $request->photo->move('etudiantPhotos',$imageName);

      $data->photo = $imageName;
      $data->nom = $request->nom;
      $data->prenom = $request->prenom;
      $data->matricule = $request->matricule;
      $data->nationalite = $request->nationalite;
      $data->adresse = $request->adresse;
      $data->sexe = $request->sexe;
      $data->date_naissance = $request->dateNais;
      $data->classe = $request->classe;
      $data->contact1 = $request->contact1;
      $data->contact2 = $request->contact2;
      $data->pere = $request->pere;
      $data->mere = $request->mere;
      $data->maladie = $request->maladie;
      $data->reduction = $request->reduction;
      $data->annee_scolaire = $request->anneeScolaire;

      if ($data->save()) {
         return redirect()->back()->with('success','Etudiant bien enregistrée!!');
      }
      else{
        return redirect()->back()->with('erreur','Cet étudiant ne peut pas être enregistrée!!');
      }
    }
  }

  public function listeEtudiant()
  {
    $data = Etudiant::select("etudiants.id","etudiants.nom","etudiants.prenom","etudiants.matricule","etudiants.photo","etudiants.reduction","classes.classes")->join('classes',"etudiants.classe","=","classes.id")->get();
    $i = 1;
    return view('admin.etudiant.liste',compact('data','i'));
  }

  public function supprimerEtudiant($id)
  {
    $data = Etudiant::find($id);

    if ($data->delete()) {
      return redirect()->back()->with('delete','Cet étudiant a bien supprimée');
    }
  }

  public function editEtudiant($id)
  {
    $data = [
      'etudiant'=>Etudiant::find($id),
      'classes'=>Classes::all()
    ];

    return view('admin.etudiant.edit')->with($data);
  }

  public function modifieEtudiant(Request $request,$id)
  {
    $data = Etudiant::find($id);

    $photo = $request->photo;

    if ($photo) {
      $imageName = time().'.'.$photo->getClientOriginalExtension();
      $request->photo->move('etudiantPhotos',$imageName);

      $data->photo = $imageName;
      $data->nom = $request->nom;
      $data->prenom = $request->prenom;
      $data->matricule = $request->matricule;
      $data->nationalite = $request->nationalite;
      $data->adresse = $request->adresse;
      $data->sexe = $request->sexe;
      $data->date_naissance = $request->dateNais;
      $data->classe = $request->classe;
      $data->contact1 = $request->contact1;
      $data->contact2 = $request->contact2;
      $data->pere = $request->pere;
      $data->mere = $request->mere;
      $data->maladie = $request->maladie;
      $data->reduction = $request->reduction;
      $data->annee_scolaire = $request->anneeScolaire;

      if ($data->save()) {
         return redirect()->back()->with('modifie','Etudiant bien modifié!!');
      }
      else{
        return redirect()->back()->with('message','Vérifiez bien votre saisie!');
      }
    }
  }

  public function detailEtudiant($id)
  {
    $data = [
      'etudiant'=>Etudiant::find($id),
      'classes'=>Classes::all()
    ];

    return view('admin.etudiant.detail')->with($data);
  }

  public function notes()
  {
    $data=[
        'etudiants'=>Etudiant::all(),
        'matieres'=>Matieres::all(),
        'exam'=>Examen::select("examens.id","examens.type_examen","saisons.saisons")->join('saisons',"examens.Id_Saison","=","saisons.id")->get()
      ];
    return view('admin.note.index')->with($data);
  }

  public function ajoutNote(Request $request)
  {
    $data = new Note();

    $data->etudiant = $request->etudiant;
    $data->matiere = $request->matiere;
    $data->exam = $request->examen;
    $data->note = $request->note;
    $data->coefficient = $request->coeff;

    if ($data->save()) {
      return redirect()->back()->with('success','Note bien enregistrée!!');
    }
    else{
      return redirect()->back()->with('erreur','Cette note ne peut pas être enregistrée!!');
    }
  }
}
