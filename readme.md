#Installation

docker run -p 80:80 cloutier/ubiquitous-train 

#Frameworks

L'interface a été créée à partir de bootstrap. Le PHP est vanilla sans framework, et il a été écrit avec Vim sur Ubuntu.

Bootstrap est dur à battre quand il s'agit de faire un site web avec une belle interface rapidement, malheureusement, les 
sites fait avec bootstrap ont un peu tendance à se ressembler. Pour une application plus grosse j'utiliserais Symphony, mais 
j'aime bien la simplicité du PHP vanilla quand l'application à faire est petite. Je garde par contre une séparation entre les parties qui
font la logique de mon code et celles qui font plus la mise en page pour pouvoir facilement intégrer un framework si l'application s'avère plus 
grosse que prévue. 

Vim/Ubuntu ne soit pas des meilleurs outils en soit, mais 
ce sont les outils avec lesquels je suis le plus productif. 

Docker est une manière extrêmement rapide de déployer un logiciel avec sa configuration et évite beaucoup de problèmes inatendus
si l'ordinateur que sur lequel je dois déployer n'est pas exactement pareil au mien. 

#Notes

Il manque la configuration de sendmail pour que les emails soit envoyé pour vrai à partir du domaine de la pizzeria.
Le message ne devrait être envoyé qu'après le paiement pour éviter des abus, ou du moins demander un captcha si la pizza est gratuite.

Les commandes sont gardées dans le fichier commandes.txt en JSON.

La liste de condiments ainsi que le nombre requis de condiments sont dans options.php. Le programme vérifie également si ces options ont changées entre le 
moment où la page est chargée et le moment où la requète est envoyée, pour ne pas envoyer une facture différente de celle que le client s'attendait recevoir.
