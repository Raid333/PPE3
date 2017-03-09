package alexandrenormand.easycook;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

public class AfficheRecette extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_affiche_recette);

        setTitle("Easy Cook - Nom de la recette");
    }
}
