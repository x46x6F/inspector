describe('Register', () => {
  it('visits the app root url', () => {
    cy.visit('http://127.0.0.1:8000/')
    cy.contains('Register').click()
    cy.get('input[id=firstname]').type('Florian')
    cy.get('input[id=lastname]').type('Girault')
    cy.get('input[id=email]').type('flo@mail.com')
    cy.get('input[id=password]').type('123456789')
    cy.get('input[id=password_confirmation]').type('123456789')
    cy.get('button').click()
  })
})