describe('Register', () => {
  it('visits the app root url', () => {
    cy.visit('http://127.0.0.1:8000/')
    cy.get('input[id=email]').type('inspector@gmail.com')
    cy.get('input[id=password]').type('inspector')
    cy.get('button').click()
  })
})