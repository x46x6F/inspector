describe('Connexion', () => {
  it('visits the app root url', () => {
    cy.visit('http://127.0.0.1:8000/')
    cy.get('input[id=email]').type('admin@admin.fr')
    cy.get('input[id=password]').type('password')
    cy.get('button').click()
  })
})