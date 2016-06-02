<?php
    
    use Illuminate\Foundation\Testing\WithoutMiddleware;
    use Illuminate\Foundation\Testing\DatabaseTransactions;

    class MenuTest extends TestCase
    {
        use DatabaseTransactions;

        public function testAccountLink()
        {
            # account solo se puede ver autentificado
            
            # invitado
            $this->visit('/')->dontsee('account');

            # Autorizado
            $user = $this->createUser();

            $this->actingAs($user)
                ->visit('/')
                ->see('account');

            $this->click('account')
                ->seePageIs('account')
                ->see('My Account');
        }
    }
