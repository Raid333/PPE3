package alexandrenormand.easycook;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ListView;
import android.widget.ArrayAdapter;

public class ListeEntree extends AppCompatActivity {

    ListView ListeView;
    String[] entrees = new String[]{
            "Tomate", "Sauce Algérienne", "patate", "sucre", "tkt meme pas", "je sais pas",
            "og kush", "ok mon gars", "Ingrid", "Jonathan", "Kevin",
    };

    @Override
        protected void onCreate(Bundle savedInstanceState) {
            super.onCreate(savedInstanceState);
            setContentView(R.layout.activity_liste_entree);
            setTitle("Easy Cook - Liste Entrée");

            //Définition de la liste des entrée
            ListeView = (ListView) findViewById(R.id.ListeView);

            ArrayAdapter<String> adapter = new ArrayAdapter<String>(ListeEntree.this,
                    android.R.layout.simple_list_item_1, entrees);
            ListeView.setAdapter(adapter);

    }
}
