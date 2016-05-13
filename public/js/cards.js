$(document).ready(function () {

        var deck = shuffle(["queen--club","5--diamond","ace--spade","king--diamond","6--club","5--heart","ace--diamond","3--diamond","2--club","7--club","queen--diamond","3--club","4--diamond","6--diamond","4--club","8--diamond","10--diamond","2--diamond","jack--club","7--heart","5--club","2--spade","7--diamond","king--spade","3--spade","ace--heart","10--heart","king--heart","6--heart","9--heart","5--spade","10--spade","7--spade","9--diamond","10--club","9--spade","6--spade","8--club","queen--spade","8--spade","8--heart","4--heart","2--heart","3--heart","ace--club","king--club","jack--heart","jack--diamond","4--spade","jack--spade","queen--heart","9--club"]);

        var imgCardPath = 'img/cards/';
        var cards;

        function setCardSrc(id,value){
            $('#card_'+id).attr('src',imgCardPath+value+'.png');
        }

        function swapCard(){
            var swapCardId = rand(0,cards.length-1);
            var oldCard = cards[swapCardId];
            
            addCard(oldCard);

            var newCard = selectCard();
            cards[swapCardId] = newCard;

            slideCard(swapCardId,newCard);
        
            setTimeout(swapCard, 3000);
        }

        function selectCard(){
            return deck.pop();
        }

        function addCard(card){
            deck.unshift(card);
        }

        function rand(min, max) {
          return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        function slideCard(id, card){
            $('#nextCard').attr('src',imgCardPath+card+'.png');

            $('#nextCardDiv').animate({top:'+=1px'}, 600, function(){
                setCardSrc(id,card);
                $('#nextCard').attr('src','img/deck.png');
            }); 
        }

        function shuffle(array)
        {
            for(var i=0;i<array.length;i++) 
            {
                var r = Math.floor(Math.random() * (i + 1));
                var v = array[i];
                array[i] = array[r];
                array[r] = v;
            }
            return array;
        }

        function setCards(){
            cards = [selectCard(),selectCard(),selectCard()];
            setCardSrc(0,cards[0]);
            setCardSrc(1,cards[1]);
            setCardSrc(2,cards[2]);
        }

        setTimeout(setCards, 3000);//display three cards
        setTimeout(swapCard, 10000);//begin swapping cards
        
});