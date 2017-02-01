package alexandrenormand.easycook;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

public class RecapRecette extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_recap_recette);
        Intent intent = getIntent();

        Button btn_return = (Button)findViewById(R.id.btn_return);
        btn_return.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(RecapRecette.this, MainActivity.class);
                startActivity(intent);


            }
        });

        // Affichage de la valeur du champ "nom de la recette"
        String NomRecette = intent.getStringExtra("NomRecette");
        TextView name_txt = (TextView) findViewById(R.id.name_txt);
        name_txt.setText(NomRecette);

        // Affichage de la valuer du champ "description de la recette"
        String DescriptionRecette = intent.getStringExtra("DescriptionRecette");
        TextView descri_txt = (TextView) findViewById(R.id.descri_txt);
        descri_txt.setText(DescriptionRecette);

        // Affichage de la valeur du spinner "Type Recette"
        String TypeRecette = intent.getStringExtra("TypeRecette");
        TextView type_txt = (TextView) findViewById(R.id.type_txt);
        type_txt.setText(TypeRecette);



        //Création d'une instance de ma classe RecetteBDD
        RecetteBDD recetteBDD = new RecetteBDD(this);

        //Création d'une recette
        Recette recette = new Recette(NomRecette, DescriptionRecette);

        //On ouvre la base de données pour écrire dedans
        recetteBDD.open();
        //On insère la recette que l'on vient de créer
        recetteBDD.insertRecette(recette);

        //Pour vérifier que l'on a bien créé notre recette dans la BDD
        //on extrait la recette de la BDD grâce au titre d'une recette que l'on a créé précédemment
        Recette recetteFromBdd = recetteBDD.getRecetteWithNom(recette.getNom());
        //Si un livre est retourné (donc si le livre à bien été ajouté à la BDD)
        if(recetteFromBdd != null){
            //On affiche les infos du livre dans un Toast
            Toast.makeText(this, recetteFromBdd.toString(), Toast.LENGTH_LONG).show();
            //On modifie le titre du livre
            recetteFromBdd.setNom("J'ai modifié le titre du livre");
            //Puis on met à jour la BDD
            recetteBDD.updateRecette(recetteFromBdd.getId(), recetteFromBdd);
        }

        //On extrait la recette de la BDD grâce au nouveau nom
        recetteFromBdd = recetteBDD.getRecetteWithNom("J'ai modifié le titre du livre");
        //S'il existe une recette possédant ce nom dans la BDD
        if(recetteFromBdd != null){
            //On affiche les nouvelles informations de la recette pour vérifier que le nom de la recette a bien été mis à jour
            Toast.makeText(this, recetteFromBdd.toString(), Toast.LENGTH_LONG).show();
            //on supprime la recette de la BDD grâce à son ID
            recetteBDD.removeRecetteWithID(recetteFromBdd.getId());
        }

        //On essaye d'extraire de nouveau la recette de la BDD toujours grâce à son nouveau nom
        recetteFromBdd = recetteBDD.getRecetteWithNom("J'ai modifié le titre du livre");
        //Si aucune recette n'est retournée
        if(recetteFromBdd == null){
            //On affiche un message indiquant que la recette n'existe pas dans la BDD
            Toast.makeText(this, "la recette n'existe pas dans la BDD", Toast.LENGTH_LONG).show();
        }
        //Si la recette existe (mais normalement elle ne devrait pas)
        else{
            //on affiche un message indiquant que la recette existe dans la BDD
            Toast.makeText(this, "Cette recette existe dans la BDD", Toast.LENGTH_LONG).show();
        }

        recetteBDD.close();
    }
}

