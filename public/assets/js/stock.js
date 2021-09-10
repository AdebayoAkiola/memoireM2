function LigneStock (codeArticle, nom_depot, nom_boutique, nom_article_toSend, description, quantiteDepot, qte, prix)
{

    this.codeArticle = codeArticle;
    this.nom_depot = nom_depot;
    this.nom_boutique = nom_boutique;
    this.nomArticle = nom_article_toSend;
    this.description = description;
    this.quantiteDepot = quantiteDepot;
    this.qteArticle = qte;
    this.prixArticle = prix;


    this.ajouterQte = function(qte)
    {
        this.qteArticle += qte;
    }
    this.getPrixLigne = function()
    {
        var resultat = this.prixArticle * this.qteArticle;
        return resultat;
    }
    this.getCode = function()
    {
        return this.codeArticle;
    }
    this.getNomArticle = function()
    {
        return this.nomArticle;
    }
    this.getDescription = function()
    {
        return this.description;
    }
}

function PanierStock()
{
    this.liste = [];
    this.ArticletoSend = function(codeArticle, nom_depot, nom_boutique, nom_article_toSend, description, quantiteDepot, qte, prix)
    {
        var index = this.getArticle(codeArticle);
        //if (index == -1) this.liste.push(new LigneStock(code, id_depot, nom_depot, id_boutique, nom_boutique, nom_article_toSend, description, quantiteDepot, qte, prix));
        if (index == -1) this.liste.push(new LigneStock(codeArticle, nom_depot, nom_boutique, nom_article_toSend, description, quantiteDepot, qte, prix));
        else this.liste[index].ajouterQte(qte);
    }
    this.getPrixPanier = function()
    {
        var total = 0;
        for(var i = 0 ; i < this.liste.length ; i++)
            total += this.liste[i].getPrixLigne();
        return total;
    }
    this.getArticle = function(codeArticle)
    {
        for(var i = 0 ; i <this.liste.length ; i++)
            if (codeArticle == this.liste[i].getCode()) return i;
        return -1;
    }
   
}
